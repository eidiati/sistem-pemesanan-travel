@extends('layout.head')
@extends('layout.main')

@section('container')

@php
    use Carbon\carbon;
@endphp
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        
        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
            <table class="w-full text-xs md:text-sm text-left rtl:text-right text-gray-500  border  border-gray-300">
                <thead class="text-xs text-center text-black uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="pl-4 ">
                            No.
                        </th>
                        <th scope="col" class="px-2 py-3  ">
                            Kode Pesanan
                        </th>
                        <th scope="col" class="px-3 py-3 w-3 ">
                            Tanggal Keberangkatan
                        </th>
                        <th scope="col" class="px-3 w-2 py-3 ">
                            Jam Keberangkatan
                        </th>
                        <th scope="col" class="px-2 py-3 ">
                            Rute
                        </th>
                       
                        <th scope="col" class="px-6 py-3 w-4">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Driver
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Mobil
                        </th>
                        <th scope="col" class="pr-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="pr-6 py-3">
                            Aksi
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesanan as $item)
                    @if($item->status_pesanan == 'selesai')
                    <tr class="bg-white  text-black hover:bg-gray-50 text-center  border  border-gray-300">
                        
                        <th scope="row" class="pl-4 text-center py-4 font-medium  whitespace-nowrap">
                            {{ $loop->iteration }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $item->kode_pemesanan}}
                        </th>
                        <td class="px-6 py-4">
                            {{ Carbon::parse($item->jadwal->tanggal)->translatedFormat('D, d M Y')}}
                        </td>
                        <td class="px-6 py-4">
                            {{ Carbon::parse($item->jadwal->jam)->translatedFormat('H.i') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->asal->nama_kota }} - {{ $item->tujuan->nama_kota }}
                        </td>
                        <td class="px-6 py-4">
                            Rp {{number_format(floatval($item->harga), 0, ',', '.')}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->jadwal->kendaraan->driver->user->name}}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->jadwal->kendaraan->merk}} {{$item->jadwal->kendaraan->model}} - {{ $item->jadwal->kendaraan->plat_nomor}}
                        </td>
                        <td class="pr-6 py-4">
                            {{ $status[$item->status_pesanan]}}
                        </td>
                        <td class="pr-6 py-4">
                            <a href="{{ route('detail.pesanan', $item->id)}}" type="button" class="block text-white hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-xl ">
                                <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                  </svg>
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
        <div class="pt-4">
            {{ $pesanan->links('pagination::tailwind') }}
            {{-- {{ $drivers->links() }} --}}
        </div>
        
    </div>
</main>

@endsection