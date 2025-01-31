@php
    use Carbon\Carbon;
@endphp

<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-center text-black uppercase bg-gray-200  border  border-gray-300">
                <tr>
                    <th scope="col" class="px-3 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Jam
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Asal
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Tujuan
                    </th>
                    <th scope="col" class="px-6 py-3 w-5">
                        Kendaraan/Plat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tarif
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Driver
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Kuota
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($jadwal->count() == 0)
                <tr class="bg-white border-b hover:bg-gray-50 text-black border text-center  border-gray-300">
                    <td colspan="11" class="px-3 py-4 text-center text-black">Tidak ada data riwayat jadwal</td>
                </tr>
                @else
                @foreach($jadwal as $item)
                <tr class="bg-white border-b hover:bg-gray-50 text-gray-900  border  border-gray-300">
                    <th scope="row" class="px-3 text-center py-4 font-medium  whitespace-nowrap">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-3 py-4">
                        {{ Carbon::parse($item->tanggal)->translatedFormat('D, d M Y')}}
                    </td>
                    <td class="px-2 py-4">
                        {{ Carbon::parse($item->jam)->translatedFormat('H.i') }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $item->asal->nama_kota }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $item->tujuan->nama_kota }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->kendaraan->merk}} {{ $item->kendaraan->model}} - {{ $item->kendaraan->plat_nomor }}
                    </td>
                    <td class="px-6 py-4 ">
                        Rp {{ number_format(floatval($item->harga), 0, ',', '.')}}
                        
                        {{-- Rp {{ number_format($item->harga, 0, ',', '.') }} --}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->kendaraan->driver->user->name }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $item->kuota_terisi}} / {{ $item->kuota }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $statuses[$item->status] ?? 'Status Tidak Tersedia' }}
                    </td>
                    <td class="px-6 py-4 w-4">
                        {{-- <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a> --}}
                        <div class="flex flex-row items-center space-x-4">
                            @if(Auth::user()->id_role == 1)
                            <a href="{{ route('admin.riwayat-jadwal.detail', $item->id)}}" type="button" class="block text-white hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-xl ">
                                <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                            </a>
                            @elseif(Auth::user()->id_role == 4) 
                                <a href="{{ route('owner.riwayat-jadwal.detail', $item->id)}}" type="button" class="block text-white hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-xl ">
                                    <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                </a> 
                            
                            @endif
                            
                            {{-- <button id="deleteButton" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  text-center " type="button" wire:click="changeDelete({{ $item->id }})">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                                
    
                            </button> --}}
                            
                            
                        </div>
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