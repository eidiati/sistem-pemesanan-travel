@extends('layout.head')
@extends('layout.mainuser')

@section('container')

<header class="bg-white shadow my-auto">
    <div class="mx-auto max-w-7xl px-2 py-3 sm:px-3 lg:px-4">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900">Detail Riwayat Pemesanan Travel</h1>
    </div>
</header>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{-- card --}}
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="grid grid-rows-1">
                <h3 class="text-xl font-bold tracking-tight daark:text-white text-center pb-6">Detail Pemesanan</h3>
                {{-- card 1--}}
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 space-y-4 md:space-y-6">
                        <div class="grid grid-cols-2">
                            <p>Nama Pelanggan</p>
                            <p>Aditya Saputra</p>
                            <p>No. Hp Pemesan</p>
                            <p>081234567890</p>
                            <p>Kota Asal</p>
                            <p>Pekanbaru</p>
                            <p>Alamat Penjemputan</p>
                            <p>Jl. Srikandi RT 01/RW 02/No. 14</p>
                            <p>Kota Tujuan</p>
                            <p>Mengkapan, Siak</p>
                            <p>Alamat Tujuan</p>
                            <p>Pelabuhan Tanjung Buton</p>
                        </div>
                          
                    </div>

                    {{-- card 1--}}
                    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 space-y-4 md:space-y-6">
                        <div class="grid grid-cols-2">
                            <p>Nama Driver</p>
                            <p>Budi Nainggolan</p>
                            <p>No. Hp Driver</p>
                            <p>081312142541</p>
                            <p>Tanggal Keberangkatan</p>
                            <p>01 November 2024</p>
                            <p>Jam keberangkatan</p>
                            <p>07:30</p>
                            <p>Biaya Pemesanan</p>
                            <p>Rp 120.000</p>
                            <p>Metode Pembayaran</p>
                            <p>Tunai</p>
                            <p>Status Pembayaran</p>
                            <p>Belum Bayar</p>
                            <p>Status Penjemputan</p>
                            <p>Menunggu</p>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
