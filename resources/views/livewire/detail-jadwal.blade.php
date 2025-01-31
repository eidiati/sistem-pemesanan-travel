@php
    use Carbon\Carbon;
@endphp
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
                <th scope="col" class="pr-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($pesan->count() == 0)
            <tr class="bg-white border-b hover:bg-gray-50 text-black border text-center  border-gray-300">
                <td colspan="9" class="px-6 py-4 text-center">
                    Tidak ada data penumpang
                </td>
            </tr>
            @else
            @foreach ($pesan as $item)
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
                <td class="pr-6 py-4">
                    <div class="flex items-center space-x-4">
                        @if(Auth::user()->id_role == 4)
                        <a href="{{ route('owner.jadwal.detail.pesanan', $item->id)}}" type="button" class="block text-white hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-xl ">
                            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </a>
                        
                        @elseif(Auth::user()->id_role == 1)
                        <a href="{{ route('detail.pesanan', $item->id)}}" type="button" class="block text-white hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-xl ">
                            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </a>
                        <button type="button" class="block text-white hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-xl "
                            wire:click="changeArmada({{ $item->id }})"
                            id="editStatus" 
                            data-modal-target="changeArmada" 
                            data-modal-toggle="changeArmada" 
                            >
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M7 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h1m4-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm7.441 1.559a1.907 1.907 0 0 1 0 2.698l-6.069 6.069L10 19l.674-3.372 6.07-6.07a1.907 1.907 0 0 1 2.697 0Z"/>
                            </svg>

                            
                            </button>
                        {{-- <button type="button" class="block text-white hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-xl "
                            wire:click="changeDelete({{ $item->id }})"
                            id="changeDelete" 
                            data-modal-target="delete" 
                            data-modal-toggle="delete" 
                            >
                            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                            </svg>
                            
                            
                        </button> --}}
                        @endif
                    
                        
                    </div>
                    
                    
                </td>
            </tr>
            
            @endforeach
            @endif
        </tbody>
    </table>
    {{-- @include('admin.modal.updateorder') --}}
    {{-- Modal Change Driver/Kendaraan/Jadwal --}}
    <div wire:ignore.self id="changeArmada" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-0 rounded-t border-b sm:mb-5">
                    
                    <h3 class="text-lg font-semibold text-gray-900">
                        Ganti Armada
                    </h3>
                    
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="changeArmada">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <form wire:submit.prevent="updateArmada" >
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="kendaraan_id" class="block mb-2 text-sm font-medium text-gray-900">Armada</label>
                                <select name="kendaraan_id" wire:model="kendaraan_id" id="kendaraan_id" required class="bg-gray-50 border border-gray-300 text-sm text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{old('kendaraan_id')}}">
                                    <option value="" disabled selected>Pilih Armada</option>
                                    @foreach ($jadwal as $item)
                                        <option value="{{ $item->id }}">{{ $item->kendaraan->plat_nomor }} - {{ $item->kendaraan->merk }} {{ $item->kendaraan->model }} - Sisa Kuota : ({{$item->kuota - $item->kuota_terisi}}) </option>
                                    @endforeach
                                </select>   
                            </div>
 
                        </div>
                        <div class="flex items-center space-x-4">
                            <button type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" >
                                Update
                            </button>
                            
                            {{-- <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Delete
                            </button> --}}
                        </div>
                    </form>
                        
                 
                </div>
               
                {{-- @endforeach --}}

            </div>
        </div>
    </div>
</div>