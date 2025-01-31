@extends('layout.head')
@extends('layout.main')

@section('container')
@php
    use Carbon\Carbon;
@endphp
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{-- card --}}
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
            @if ($errors->any())
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-blue-300 rounded-lg bg-blue-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        {{ session('success') }}
                    </div>
                </div>
            @endif 


            @if(session()->has('error'))
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-blue-300 rounded-lg bg-blue-50" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            {{-- @if($pesanAktif as $key =>jadwal->status != 'selesai') --}}

            @if($pesan->isNotEmpty())
            <p class="mb-3">
                
                
            </p>
            @if($pesan->isNotEmpty())
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
                <span class="sr-only">Info</span>
            <div>
                Hai, {{ Auth::user()->name }}. Berikut ini daftar pesanan kamu yang sedang aktif.
            </div>
        </div>
        @endif
            @foreach ($pesan as $pesanan)
            @if($pesanan->status_bayar == 'belum lunas' && $pesanan->metode_bayar == 'transfer')
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-blue-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                    <span class="sr-only">Info</span>
                <div>
                    Silahkan lakukan pembayaran melalui bank yang tersedia. Untuk mengetahui bank, silahkan lihat di detail pesanan!
                </div>
            </div>
            @endif
            @if($pesanan->note != NULL)
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-blue-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                    <span class="sr-only">Info</span>
                <div>
                    {{ $pesanan->note}}
                </div>
            </div>
            @endif
            {{-- Card --}}
            <div class="">
                <a href="{{ route('detail.pesanan', $pesanan->id)}}" class="w-full card flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-4">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pesanan #{{ $pesanan->kode_pemesanan}} </h5>
                        <div class="">
                            <p><b>Jadwal : </b> {{ Carbon::parse($pesanan->jadwal->tanggal)->format('d F Y') }} - {{ Carbon::parse($pesanan->jadwal->jam)->format('H:i') }} </p>
                            <p><b>Mobil Travel : </b> {{$pesanan->jadwal->kendaraan->merk }} {{$pesanan->jadwal->kendaraan->model}} - {{$pesanan->jadwal->kendaraan->plat_nomor}} </p>
                            <p><b>Driver : </b> {{$pesanan->jadwal->kendaraan->driver->user->name}} </p>
                            
                        </div>
                        <div class="">
                            <p><b>Jumlah Kursi : </b> {{$pesanan->kursi}} </p>
                            <p><b>Status Pembayaran : </b> {{$pesanan->status_bayar}} </p>
                            <p><b>Status Pesanan : </b> {{$statuses[$pesanan->jadwal->status]}} </p>
                        </div>
                    </div>
                    <div>
                    
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <div class="col-12">
                <p class="text-center">Hai,  {{ Auth::user()->name }}. Kamu tidak memiliki pesanan yang sedang aktif. <br> Ayo Pesan Sekarang.</p>
            </div>
            @endif
            {{-- <a href="#" class="w-full card flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pesanan #BMP-001</h5>
                    <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        <p>Jadwal : </p>
                        <p>Mobil Travel : </p>
                        <p>Jumlah Kursi : </p>
                        <p>Status Pembayaran : </p>
                        <p>Status Pesanan : </p>
                    </div>
                </div>
                <div>
                    <p>t4</p>
                </div>
            </a> --}}
            

           

            
        </div>
    </div>
</main>



@endsection
