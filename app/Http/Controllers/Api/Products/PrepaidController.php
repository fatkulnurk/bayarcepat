<?php

namespace App\Http\Controllers\Api\Products;

use App\Enums\Balance;
use App\Enums\PrepaidEnum;
use App\Http\Controllers\Controller;
use App\Models\Balances;
use App\Models\TransactionPrepaid;
use App\Models\TransactionPrepaidResponse;
use App\Services\Digiflazz\Buyer\DigiflazzBuyer;
use App\Services\RandomRefID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrepaidController extends Controller
{
    protected $digiflazzBuyer;
    protected $user;

    /*
     * SEMUA KODE INI HARUS DILAKUKAN MIGRASI KE SERVICE (SAAT INI SEDANG DALAM PROSES PEMBUATAN)
     * */

    public function __construct()
    {
        $this->user = Auth::user();
        $this->digiflazzBuyer = new DigiflazzBuyer();
        return $this;
    }

    public function index(Request $request)
    {
        $data = $this->digiflazzBuyer
            ->getPrepaid()
            ->group();

        if ($request->query('category', false) == true) {
            $data = $data->groupBy('category');
        }elseif ($request->query('brand', false) == true) {
            $data = $data->groupBy('brand');
        }elseif ($request->query('group', false) == true) {
            $data = $data->group();
        }

        return $data->get();
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'buyer_sku_code' => 'required',
            'customer_number' => 'required'
        ]);

        if (!$validate) {
            return response()->json([
                'status' => false,
                'message' => 'Kode produk atau nomor pelanggan tidak valid [Mohon menghubungi kami].'
            ], 422);
        }

        $refId = RandomRefID::make();
        $customerNumber = $request->customer_number;
        $buyerSkuCode = $request->buyer_sku_code;
        $message = $request->has('message') ? $request->message : '';
        $isTesting = $request->has('testing');

        $product = $this->digiflazzBuyer
            ->getPrepaid($buyerSkuCode)
            ->toArray();

        if (blank($product)) {
            return response()->json([
                'status' => false,
                'message' => 'Produk tidak ditemukan, mohon menghubungi kami dengan isi pesan [[#ERROR829]].'
            ], 422);
        }

        if ($product['price'] >= Auth::user()->balance) {
            return response()->json([
                'status' => false,
                'message' => 'Saldo anda tidak mencukupi.'
            ], 402);
        }

        $transactionPrepaid = TransactionPrepaid::create([
            'user_id' => Auth::id(),
            'ref_id' => $refId,
            'product' => $product,
            'customer_number' => $customerNumber,
            'status' => PrepaidEnum::STATUS_PROCESS,
            'price' => $product['price']
        ]);

        $balance = Balances::create([
            'user_id' => Auth::id(),
            'type' => Balance::OUT,
            'amount' => $product['price'],
            'title' => \App\Enums\BalanceTitle::TRANSACTION_PREPAID,
            'trx_id' => $transactionPrepaid->id,
            'previous_balance' => (Auth::user()->balance - $product['price'])
        ]);

        try {
            $resultBuy = $this->digiflazzBuyer
                ->buyPrepaid($buyerSkuCode, $customerNumber, $refId, $isTesting, $message);
            $resultBuy = collect($resultBuy['data'])->toArray();
        } catch (\Exception $exception) {
            $balance = Balances::create([
                'user_id' => Auth::id(),
                'type' => Balance::IN,
                'amount' => $product['price'],
                'title' => \App\Enums\BalanceTitle::TRANSACTION_REFUND_PREPAID,
                'trx_id' => $transactionPrepaid->id,
                'previous_balance' => (Auth::user()->balance + $product['price'])
            ]);

            $responseCallback = TransactionPrepaidResponse::create([
                'transaction_prepaid_id' => $transactionPrepaid->id,
                'ref_id' => $transactionPrepaid->ref_id,
                'message' => $exception->getMessage(),
            ]);

            // mengupdate status pada transactionPrepaid
            $transactionPrepaid->status = PrepaidEnum::STATUS_FAILED;
            $transactionPrepaid->save();

            return response()->json([
                'status' => false,
                'message' => 'Transaksi gagal.... ' . $exception->getFile()
            ], 422);
        }

        // menangkap hasil response
        $responseCallback = TransactionPrepaidResponse::create([
            'transaction_prepaid_id' => $transactionPrepaid->id,
            'ref_id' => $resultBuy['ref_id'],
            'message' => $resultBuy['message'],
            'status' => $resultBuy['status'],
            'rc' => $resultBuy['rc'],
            'sn' => $resultBuy['sn'],
            'buyer_last_saldo' => $resultBuy['buyer_last_saldo'],
            'price' => $resultBuy['price']
        ]);

        // mengupdate status pada transactionPrepaid
        $transactionPrepaidStatus = PrepaidEnum::isStatusEnum($resultBuy['rc'], $resultBuy['status']);
        $transactionPrepaid->status = $transactionPrepaidStatus;
        $transactionPrepaid->save();

        return response()->json([
            'status' => true,
            'message' => 'Transaksi anda sedang di proses.',
            'transaction_id' => $transactionPrepaid->id
        ], 200);
    }
}
