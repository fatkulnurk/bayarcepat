@extends('layouts.app')

@section('title', 'Bisnis Pembayaran dan Keuangan Dalam Satu Genggaman')

@section('content')
    <div class="hero is-fullheight-with-navbar is-primary">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column has-text-centered-touch has-text-justify">
                        <h1 class="title is-1">Platform digital untuk solusi bisnis kamu</h1>
                        <h2 class="subtitle is-4">Cukup satu akun, dapat digunakan untuk transaksi ribuan produk dari ratusan server sekaligus. </h2>
                        <div class="buttons">
                            <a href="{{ route('register') }}" class="button is-white is-rounded is-medium">Mendaftar</a>
                            <a href="{{ route('register') }}" class="button is-primary is-light is-rounded is-outlined is-medium">Masuk</a>
                        </div>
                    </div>
                    <div class="column has-text-centered is-hidden-touch">
                        <p>
                            <img src="{{ asset('images/undraw_Mobile_pay_re_sjb8.svg')  }}" alt="BayarCepat Payments" style="width: 480px">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <nav class="level">
            <div class="level-item has-text-centered">
                <div>
                    <p class="title">3,456</p>
                    <p class="heading">Pengguna Bergabung</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="title">200K+</p>
                    <p class="heading">Transaksi Berhasil</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="title">1030+</p>
                    <p class="heading">Produk Tersedia</p>
                </div>
            </div>
        </nav>
    </div>
    <div class="section hero-welcome-bottom has-background-light">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-6 is-hidden-touch">
                    <figure class="image is-5by4">
                        <img src="{{ asset('images/undraw_Savings_dwkw.svg') }}" alt="">
                    </figure>
                </div>
                <div class="column is-6 has-text-centered-touch">
                    <div class="content">
                        <h3 class="title is-2 is-bold is-title-reveal has-text-primary">Apa itu {{ config('app.name') }}?</h3>
                        <p class="subtitle is-4">{{ config('app.name') }} Adalah Marketplace Produk Digital, Social Media Marketing, Distributor & Server Pulsa H2H Termurah dan Terlengkap yang menyediakan berbagai produk (Prabayar & Pascabayar).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section has-background-white is-medium">
        <div class="container">
            <div class="columns">
                <div class="column is-offset-2 is-8">
                    <div class="columns">
                        <div class="column">
                            <div class="content has-text-centered">
                                <h3 class="title is-2 is-bold is-title-reveal has-text-primary">Mengapa Memilih Kami?</h3>
                                <div class="columns">
                                    <div class="column is-10 is-offset-1">
                                        <p class="subtitle">
                                            Kami merupakan salah satu server pulsa elektrik termurah yang ada di Indonesia. Anda bisa bertransaksi melalui Website dan API untuk melakukan pengisian pulsa All Operator, Pembayaran PLN Prabayar, Voucher Game Online, Beli Paket kuota online dll
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <p>
                                    <img src="data:image/png;base64,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"/>
                                </p>
                                <p class="has-text-weight-bold">Pendaftaran Gratis Dan Mudah</p>
                                <p>Tanpa biaya pendaftaran 100% Gratis, setelah mendaftar akun anda langsung aktif dan dapat melakukan deposit.</p>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <p>
                                    <img src="data:image/png;base64,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"/>
                                </p>
                                <p class="has-text-weight-bold">Transaksi 24 Jam</p>
                                <p>Jam berapapun masih bisa melakukan transaksi Pulsa, Paket Internet, Paket SMS, Token PLN, dan lain lain.</p>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <p>
                                    <img src="data:image/png;base64,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"/>
                                </p>
                                <p class="has-text-weight-bold">Harga Terbaik dan Terpercaya</p>
                                <p>Kami melakukan inovasi, sehingga transaksi semakin lancar dengan harga paling pulsa dan paket internet murah.</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <p>
                                    <img src="data:image/png;base64,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"/>
                                </p>
                                <p class="has-text-weight-bold">Metode Pembayaran</p>
                                <p>Banyak pilihan untuk melakukan deposit, mulai dari bank, kartu debit, kartu kredit dan paypal. Kedepannya jelas akan bertambah.</p>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <p>
                                    <img src="data:image/png;base64,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"/>
                                </p>
                                <p class="has-text-weight-bold">Produk Paling Lengkap</p>
                                <p>Tersedia Produk yang lengkap, mulai dari Pulsa All Oprator, Paket Data, Token PLN, Saldo Ewallet, PDAM, Voucher Game, Kredit Motor, dll.</p>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <p>
                                    <img src="data:image/png;base64,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"/>
                                </p>
                                <p class="has-text-weight-bold">Transaksi Aman</p>
                                <p>{{ config('app.name') }} menggunakan Secure Sockets Layer (SSL) dan TLS yang memastikan semua informasi terjaga dalam setiap transaksi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-4 is-offset-2">
                            <div class="box has-text-centered">
                                <p>
                                    <img src="data:image/png;base64,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"/>
                                </p>
                                <p class="has-text-weight-bold">Jalur Trasanksi Online</p>
                                <p>Banyak pilihan untuk melakukan deposit, mulai dari bank, kartu debit, kartu kredit dan paypal. Kedepannya jelas akan bertambah.</p>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <p>
                                    <img src="data:image/png;base64,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"/>
                                </p>
                                <p class="has-text-weight-bold">Paypal & Kartu Kredit</p>
                                <p>Anda bisa beli pulsa pakai paypal dan kartu kredit, beli kuota pakai paypal, beli token listrik pakai paypal, bahkan tukar paypal ke bank.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section has-background-light is-fullwidth">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column has-text-centered">
                        <h3 class="title is-3 has-text-weight-bold">Bantuan (FAQ)</h3>
                        <p class="subtitle">Hal yang sering ditanyakan ?</p>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-6">
                        <div class="box">
                            <p class="has-text-weight-bold">Bagaimana menjadi agen di {{ config('app.name') }}?</p>
                            <p>
                                Untuk menjadi agen di {{ config('app.name') }} Pulsa cukup mudah, kami punya 3 cara mudah untuk memulai bisnis anda dengan cara mendaftar, Deposit dan Transaksi.
                            </p>
                        </div>
                        <div class="box">
                            <p class="has-text-weight-bold">Sistem pembayaran apa yang digunakan di {{ config('app.name') }}?</p>
                            <p>
                                Kami menerapkan sistem deposit yang di mana agen/member melakukan pengisian saldo untuk dapat bertransaksi pulsa, paket data, transfer uang di {{ config('app.name') }}.
                            </p>
                        </div>
                        <div class="box">
                            <p class="has-text-weight-bold">Jalur Transaksi apa yang digunakan?</p>
                            <p>Saat ini kami menyediakan jalur transaksi online (website) dan Transaksi via API.
                            </p>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="box">
                            <p class="has-text-weight-bold">Apakah transaksi di {{config('app.name') }} bisa 24 Jam?</p>
                            <p>
                                Benar, sistem kami dapat bekerja selama 24 jam non stop dan pengguna dapat melakukan aktivitas transaksi selama 24 jam.
                            </p>
                        </div>
                        <div class="box">
                            <p class="has-text-weight-bold">Apa ada batasan jumlah saldo deposit di {{ config('app.name') }}?</p>
                            <p>
                                Kami tidak membatasi jumlah deposit saldo anda, anda dapat melakukan deposit saldo sesuai keinginan anda. Tapi saran kami tidak lebih dari 10 Juta.
                            </p>
                        </div>
                        <div class="box">
                            <p class="has-text-weight-bold">Apakah config('app.name') }} Mendukung Paypal?</p>
                            <p>
                                Iya benar, anda bisa memakai paypal untuk melakukan deposit dan melakukan pembelian produk. Mulai dari pulsa lewat paypal, paket internet pakai paypal, dll.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section has-background-light is-medium">
        <div class="container">
            <div class="content has-text-centered">
                <h3 class="subtitle is-2">Apa Kata Member?</h3>
                <div class="columns">
                    <div class="column is-10 is-offset-1">
                        <p class="subtitle">
                            Ini kata Mereka Yang telah bergabung menjadi member di {{ config('app.name') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">John Smith</p>
                                    <p class="subtitle is-6">@johnsmith</p>
                                </div>
                            </div>

                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                                <a href="#">#css</a> <a href="#">#responsive</a>
                                <br>
                                <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">John Smith</p>
                                    <p class="subtitle is-6">@johnsmith</p>
                                </div>
                            </div>

                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                                <a href="#">#css</a> <a href="#">#responsive</a>
                                <br>
                                <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">John Smith</p>
                                    <p class="subtitle is-6">@johnsmith</p>
                                </div>
                            </div>

                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                                <a href="#">#css</a> <a href="#">#responsive</a>
                                <br>
                                <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero is-medium is-white is-fullwidth">
        <div class="hero-body">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="box has-text-centered is-dotted">
                        <h3 class="title is-1 has-text-black">Mendaftar Sekarang</h3>
                        <br>
                        <p class="subtitle is 2 has-text-black-bis">Gabung bersama kami, sama seperti pedagang lainnya & raih keuntungan dari penjual ulang produk</p>
                        <br>
                        <p>
                            <a href="{{ route('register') }}" class="button is-primary is-rounded is-medium">Daftar Sekarang</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section has-background-white is-fullwidth is-hidden">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h3 class="title is-3 has-text-weight-bold">Beli Pulsa di {{ config('app.name')  }}: Mudah, Cepat, Tidak Ribet</h3>
                <div class="columns">
                    <div class="column is-10 is-offset-1 has-text-centered">
                        <div class="box subtitle">
                            Kehabisan pulsa? {{ config('app.name')  }} menyediakan layanan isi ulang pulsa kapan saja dan dengan segala macam metode pembayaran, salah satunya adalah lewat paypal (pulsa paypal murah).
                            Tidak perlu lagi kesulitan online tengah malam karena layanan isi ulang pulsa di {{ config('app.name')  }} aktif 24 jam dan support segala macam jenis pembayaran.
                            Isi ulang pulsa operator Telkomsel, Indosat, XL, Tri, Axis, Bolt, dan Smartfren dengan beragam nominal yang tersedia mulai dari 1.000 sampai 1.000.000, semua hadir untuk kemudahan anda membeli pulsa secara online.
                        </div>
                        <div class="box subtitle">
                            Kami mendukung berbagai jenis pembayaran untuk melakukan deposit. Kami mendukung metode pembayaran Bank, Kartu Debit, Kartu Kredit dan Paypal.
                        </div>
                        <div class="box subtitle">
                            Bukan pulsa yang anda cari?
                            Kami juga menyediakan berbagai macam layanan lainnya seperti isi ulang paket data untuk anda yang butuh kuota internet dengan harga murah, pembayaran BPJS, Pembayaran PLN, Voucher Wifi.
                            semua dengan proses yang sangat mudah, cepat, dan customer service yang aktif 24 jam.
                        </div>
                        <div class="box subtitle">
                            Kami mendukung paypal sepenuhnya. Anda bisa beli pulsa bayar paypal, untuk pembelian pulsa paypal kami menerima akun paypal verified dan akun paypal unverified.
                            Anda bisa beli pulsa bayar dengan paypal mulai dari nominal 1000 sampai 1 juta. Dengan adanya kami, diharapkan beli pulsa dengan paypal dan beli paketan dengan paypal menjadi lebih mudah.
                            Bukan cuma pulsa, anda bisa beli paket data dengan paypal, kuota internet dengan paypal, isi saldo gojek pakai paypal, isi saldo ovo pakai paypal, isi saldo dana dengan paypal, isi saldo linkaja lewat paypal, anda juga bisa beli token pln dengan PLN.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="notification-modal">
        {{--    <div class="modal is-active" id="notification-modal">--}}
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Pemberitahuan</p>
                <button class="delete" aria-label="close" onclick="closeNotificationModal()"></button>
            </header>
            <section class="modal-card-body">
                <p class="subtitle">
                    {{ config('app.name') }} bukanlah aplikasi untuk peminjaman uang online,
                    bukan aplikasi jasa cicilan, bukan aplikasi investasi, bukan aplikasi p2p lending, bukan aplikasi urun dana, bukan aplikasi kredit online.
                </p>

                <p class="subtitle">
                    Pendaftaran member di website ini adalah gratis, alias tanpa di pungut biaya apapun.
                </p>

                <p class="subtitle">
                    Sampai saat ini semua transaksi hanya lewat web www.bayarcepat.com dan belum ada aplikasi mobile (dalam proses pembuatan).
                </p>
            </section>
            <footer class="modal-card-foot has-text-right">
                <button class="button is-primary" onclick="closeNotificationModal()">Tutup Pemberitahuan</button>
            </footer>
        </div>
    </div>
@endsection
@push('stack-foot')
    <style>
        .is-dotted {
            border: dotted 4px mediumspringgreen !important
        }
    </style>
@endpush
@push('stack-foot')
    <script>
        // Warning before leaving the page (back button, or outgoinglink)
        // window.onbeforeunload = function() {
        //     return "Apakah anda yakin ingin menutup?";
        // }
        function closeNotificationModal() {
            var element = document.getElementById("notification-modal");
            element.classList.remove("is-active");
        }
    </script>
@endpush
