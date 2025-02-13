@extends('layout.head')
@extends('layout.main')

@section('container')
@php
use Carbon\carbon;
@endphp

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

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
        
        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                {{-- <div>
                    <p>Tanggal</p>
                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5" type="button">
                        <svg class="w-3 h-3 text-gray-500 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                            </svg>
                        Last 30 days
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                    <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                    <label for="filter-radio-example-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded">Last day</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                    <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                    <label for="filter-radio-example-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded">Last 7 days</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                    <input id="filter-radio-example-3" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                    <label for="filter-radio-example-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded">Last 30 days</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                    <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                    <label for="filter-radio-example-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded">Last month</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                    <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                    <label for="filter-radio-example-5" class="w-full ms-2 text-sm font-medium text-gray-900 rounded">Last year</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>
            <table class="w-full text-xs md:text-sm text-left rtl:text-right text-gray-500  border  border-gray-300">
                <thead class="text-xs text-center text-black uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-2 py-3 w-3">
                            No.
                        </th>
                        <th scope="col" class="px-3 py-3 w-4">
                            Tanggal
                        </th>
                        <th scope="col" class="px-2 py-3 w-3">
                            Jam
                        </th>
                        <th scope="col" class="px-3 py-3 w-6">
                            Rute
                        </th>
                        <th scope="col" class="px-6 py-3 w-5">
                            Kendaraan/Plat
                        </th>
                        <th scope="col" class="px-6 py-3 w-8">
                            Tarif
                        </th>
                        <th scope="col" class="px-3 py-3 w-5">
                            Kuota
                        </th>
                        <th scope="col" class="px-3 py-3 w-5">
                            Status
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Aksi
                        </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                        $filterRiwayat = $jadwal->filter(function ($jadwal) {
                            return in_array($jadwal->status, ['selesai']);
                        });
                        
                    @endphp
                    @if($filterRiwayat->isEmpty())
                    <tr>
                        <td colspan="8" class="px-3 py-4 text-center text-black">Belum ada riwayat keberangkatan</td>
                    </tr>
                    @else
                    @foreach($filterRiwayat as $item)
                    <tr class="bg-white text-black hover:bg-gray-50 text-center  border  border-gray-300">
                        <th scope="row" class="px-1 py-4 font-medium whitespace-nowrap">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-3 py-4">
                            {{ Carbon::parse($item->tanggal)->translatedFormat('D, d M Y')}}
                        </td>
                        <td class="px-2 py-4">
                            {{ Carbon::parse($item->jam)->translatedFormat('H.i') }}
                        </td>
                        <td class="px-3 py-4">
                            {{ $item->asal->nama_kota }} - {{ $item->tujuan->nama_kota }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->kendaraan->merk}} {{ $item->kendaraan->model}} - {{ $item->kendaraan->plat_nomor }}
                        </td>
                        <td class="px-3 py-4">
                            Rp {{number_format(floatval($item->harga), 0, ',', '.')}}
                            
                            {{-- Rp {{ number_format($item->harga, 0, ',', '.') }} --}}
                        </td>
                        <td class="px-3 py-4">
                            {{ $item->kuota_terisi}} / {{ $item->kuota }}
                        </td>
                        <td class="px-3 py-4">
                            {{ $statuses[$item->status] ?? 'Status Tidak Tersedia' }}
                        </td>
                        
                    </tr>
                    @endforeach
                    
                    @endif
                </tbody>
            </table>
        </div>

        <div class="pt-4">
            {{ $jadwal->links('pagination::tailwind') }}
            {{-- {{ $drivers->links() }} --}}
        </div>
    </div>

</main>

@endsection