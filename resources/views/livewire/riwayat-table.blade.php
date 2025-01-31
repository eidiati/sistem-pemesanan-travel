@php
    use Carbon\Carbon;
@endphp


<div class="">
    <div class="border relative overflow-x-auto shadow-md sm:rounded-lg flex items-center flex-column flex-wrap md:flex-row space-y-4 md:space-y-0  bg-white">
        <table class="w-full text-xs md:text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-black text-center uppercase bg-gray-200  border  border-gray-300">
                <tr>
                    {{-- <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th> --}}
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode Pemesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pelanggan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. HP
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rute 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jadwal Keberangkatan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status Pemesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                <tr class="bg-white border-b hover:bg-gray-50 text-black border text-center  border-gray-300">
                    {{-- <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td> --}}
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 text-center whitespace-nowrap">
                        {{ $loop->iteration}}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->kode_pemesanan}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->user->no_hp}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->asal->nama_kota}} - {{ $item->tujuan->nama_kota}}
                    </td>
                    <td class="px-6 py-4">
                        {{ Carbon::parse($item->jadwal->tanggal)->translatedFormat('D, d M Y') }} - 
                        {{ Carbon::parse($item->jadwal->jam)->translatedFormat('H.i') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->status_bayar}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $statuses[$item->jadwal->status] }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-4">
                            @if(Auth::user()->id_role == 1)
                            <a href="{{ route('detail.pesanan', $item->id)}}" type="button" class="block text-white hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-xl ">
                                <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </a>
                            @elseif(Auth::user()->id_role == 4)
                            <a href="{{ route('owner.riwayat.detail', $item->id)}}" type="button" class="block text-white hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-xl ">
                                <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </a>
                            @endif
                            
                            
                            
                        </div>
                        
                        
                    </td>
                </tr>
                
                @endforeach
                
            </tbody>
        </table>
    </div>
    <div class="pt-4">
        {{ $orders->links('pagination::tailwind') }}
        {{-- {{ $drivers->links() }} --}}
    </div>
</div>
    {{-- @include('admin.modal.updateorder') --}}