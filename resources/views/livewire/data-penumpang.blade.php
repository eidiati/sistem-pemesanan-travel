<div>
    <table class="w-full text-sm text-left rtl:text-right border  border-gray-300 text-black">
        <thead class="text-xs text-black uppercase bg-gray-200 ">
            <tr class="">
                
                <th scope="col" class="px-5 py-3 text-center">
                    No.
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Nama Penumpang
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Jumlah Penumpang
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Alamat Penjemputan
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Alamat Pengantaran
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Kontak
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Metode dan Status Pembayaran
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Action
                </th>
            </tr>
        </thead>
        {{-- @if($data) --}}
        @forelse ($data as $item)
        <tbody>
            <tr class="bg-white border-b hover:bg-gray-50 justify-center">
                <th scope="row" class="text-center px-1 py-4">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4 text-center">
                    {{ $item->user->name }}
                </td>
                <td class="px-3 py-4 w-3 text-center">
                    {{ $item->kursi }}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $item->alamat_jemput }}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $item->alamat_tujuan }}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $item->user->no_hp }}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $metodeBayars[$item->metode_bayar] }} - {{ $item->status_bayar}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $statuses[$item->status_pesanan]}}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-4">
                        @if($item->metode_bayar == 'cash' && $item->status_bayar == 'Belum Lunas')
                        <button type="button" class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            wire:click="changeStatus({{ $item->id }})"
                            id="updateProductButton" 
                            data-modal-target="lunas" 
                            data-modal-toggle="lunas" 
                            >
                        Lunas
                        </button>
                        @elseif($item->status_pesanan == 'proses')
                        <button id="updateButton" class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" type="button" 
                            wire:click="changeStatus({{ $item->id }})"
                            {{-- onclick="openModal(this)" --}}
                            data-modal-target="updateStatus1" 
                            data-modal-toggle="updateStatus1"
                            data-id ="{{ $item->id }}"
                            data-name = "{{$item->user->name}}"
                            data-status = "{{$item->status_pesanan}}" >
                            Update Status
                        </button>
                        @elseif($item->status_pesanan == 'dijemput')
                        <button id="updateButton" class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" type="button" 
                            wire:click="changeStatus({{ $item->id }})"
                            {{-- onclick="openModal(this)" --}}
                            data-modal-target="updateStatus2" 
                            data-modal-toggle="updateStatus2"
                            data-id ="{{ $item->id }}"
                            data-name = "{{$item->user->name}}"
                            data-status = "{{$item->status_pesanan}}" >
                            Update Status
                        </button>
                        
                        @endif
                        <button id="updateButton" class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" type="button"  onclick="window.location.href='{{ route('detail.pesanan', $item->id) }}'">
                            Detail 
                        </button>
                        
                        
                    </div>
                </td>
            </tr>
            @empty
            {{-- @else --}}
            <tr>
                <td colspan="9" class="text-center px-4 py-4 border border-gray-300 text-black">
                    <p>Tidak ada data penumpang ditemukan</p>
                </td>
            </tr>
            
        </tbody>
        @endforelse
    </table>
    {{-- modal 2 --}}
    <div wire:ignore.self id="updateStatus2" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-2 rounded-t border-b sm:mb-5">
                    
                    <h3 class="text-lg font-semibold text-gray-900">
                        Update Status
                    </h3>
                    
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="updateStatus2">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->                
                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">

                    <p class="mb-4 text-black dark:text-gray-300" id="modalText">Apakah anda sudah melakukan pengantaran atas nama {{$userName}} </p>

                        @csrf
                        <div class="flex justify-center items-center space-x-4">
                            <button data-modal-toggle="delete" type="button" class="py-2 px-3 text-sm font-medium text-white bg-gray-500 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Tidak
                            </button>
                            <button type="button" class="py-2 px-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-900" wire:click="updateStatus2()">
                                Ya, sudah
                            </button>
                        </div>
                    {{-- </form> --}}
                </div>
                
            </div>
        </div>
    </div>
    <div wire:ignore.self id="updateStatus1" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-2 rounded-t border-b sm:mb-5">
                    
                    <h3 class="text-lg font-semibold text-gray-900">
                        Update Status
                    </h3>
                    
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="updateStatus1">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->                
                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">

                    <p class="mb-4 text-black dark:text-gray-300" id="modalText">Apakah anda sudah melakukan penjemputan atas nama {{$userName}} </p>

                        @csrf
                        <div class="flex justify-center items-center space-x-4">
                            <button data-modal-toggle="delete" type="button" class="py-2 px-3 text-sm font-medium text-white bg-gray-500 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Tidak
                            </button>
                            <button type="button" class="py-2 px-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-900" wire:click="updateStatus1()">
                                Ya, sudah
                            </button>
                        </div>
                    {{-- </form> --}}
                </div>
                
            </div>
        </div>
    </div>
    {{-- Modal 1 --}}
    <div wire:ignore.self id="lunas" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-2 rounded-t border-b sm:mb-5">
                    
                    <h3 class="text-lg font-semibold text-gray-900">
                        Pembayaran Cash
                    </h3>
                    
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="lunas">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                
                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <p class="mb-4 text-black dark:text-gray-300">Apakah anda sudah menerima pembayaran dari {{$userName}} sebesar  Rp {{number_format(floatval($harga), 0, ',', '.')}} ?</p>
                    <form action="{{route('driver.lunas', $item->id)}}" method="POST">
                        @csrf
                        <div class="flex justify-center items-center space-x-4">
                            <button data-modal-toggle="delete" type="button" class="py-2 px-3 text-sm font-medium text-white bg-gray-500 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Tidak
                            </button>
                                <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-900">
                                    Ya, sudah
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
