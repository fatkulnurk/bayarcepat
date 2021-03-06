<?php

namespace App\Http\Controllers\Dashboard\Balance;

use App\Enums\BankEnum;
use App\Enums\TransactionEnum;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function create()
    {
        $banks = BankEnum::getAll();
        return view('dashboard.balance.withdrawal' , compact('banks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_account_name' => 'required',
            'bank_account_number' => 'required',
            'bank_name' => 'required',
            'bank_amount_money' => 'required',
            'note' => 'nullable',
        ]);

        // informasi transaksi
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'type' => TransactionEnum::$typeBayarCepatPayWithdrawal,
            'value' => $request->input('bank_amount_money', 0),
            'message' => $request->input('note', null),
            'information' => $request->only([
                'bank_account_name',
                'bank_account_number',
                'bank_name',
                'bank_amount_money',
                'note'
            ])
        ]);

        return redirect()
            ->route('web.dashboard.balance.withdrawal.create')
            ->with('success', 'Pengajuan penarikan anda sedang di proses. Buka halaman riwayat transaksi untuk melihat status penarikan.');
    }
}
