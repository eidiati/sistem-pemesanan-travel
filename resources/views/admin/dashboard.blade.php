@extends('layout.head')
@extends('layout.main')

@section('container')

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        @if(Auth::user()->id_role == 1)
        <h4 class="text-xl pb-4">Selamat Datang, {{ Auth::user()->name }}</h4>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">

            {{-- card 1--}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-gray-200 border border-gray-200 rounded-lg shadow ">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 text-right">{{ $totalPemesanan }}</h2>
                    <p class="font-normal text-gray-700 text-right">Pemesanan</p>
                </a>
            </div>

            {{-- card 2--}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-gray-200 border border-gray-200 rounded-lg shadow ">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 text-right">{{ $totalRute }}</h2>
                    <p class="font-normal text-gray-700 text-right">Rute</p>
                </a>
            </div>
            {{-- card 3 --}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-gray-200 border border-gray-200 rounded-lg shadow ">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 text-right">{{ $totalDriver }}</h2>
                    <p class="font-normal text-gray-700 text-right">Driver</p>
                </a>
            </div>
            {{-- card 4 --}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-gray-200 border border-gray-200 rounded-lg shadow ">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 text-right">{{ $totalKendaraan }}</h2>
                    <p class="font-normal text-gray-700 text-right">Kendaraan</p>
                </a>
            </div>
        </div>

        @elseif(Auth::user()->id_role == 4)
        <h4 class="text-xl pb-4">Selamat Datang, {{ Auth::user()->name }}</h4>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">

            {{-- card 1--}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 text-right">{{ $totalPemesanan }}</h2>
                    <p class="font-normal text-gray-700 text-right">Pemesanan</p>
                </a>
            </div>

            {{-- card 2--}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 text-right">{{ $totalRute }}</h2>
                    <p class="font-normal text-gray-700 text-right">Rute</p>
                </a>
            </div>
            {{-- card 3 --}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 text-right">{{ $totalDriver }}</h2>
                    <p class="font-normal text-gray-700 text-right">Driver</p>
                </a>
            </div>
            {{-- card 4 --}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 text-right">{{ $totalKendaraan }}</h2>
                    <p class="font-normal text-gray-700 text-right">Kendaraan</p>
                </a>
            </div>
        </div>
        @endif
    </div>
</main>

@endsection
