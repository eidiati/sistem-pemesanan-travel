<div class="">
    <div class="border relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-center text-black uppercase bg-gray-200  border  border-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3 w-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Merk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Model
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Plat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Driver
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    @if(Auth::user()->id_role == 1)
                    <th scope="col" class="px-6 py-3 w-5">
                        Aksi
                    </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($kendaraans as $item)
                <tr class="bg-white hover:bg-gray-50 text-gray-900  border  border-gray-300 text-center">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $kendaraans->firstItem() + $loop->index }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->merk}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->model}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->plat_nomor}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->driver->user->name}}
                    </td>
                    <td class="px-6 py-4">
                        @if($item->status == "tersedia")
                            Tersedia
                        @elseif($item->status == "perbaikan")
                            Dalam Perbaikan
                        @elseif($item->status == "rusak")
                            Rusak
                        @else
                            Tidak Tersedia
                        @endif
                        
                        {{-- {{ $item->status }} --}}
                    </td>
                    @if(Auth::user()->id_role == 1)
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-4">
                            <button type="button" class="block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center"
                                wire:click="changeEdit({{ $item->id }})"
                                id="updateProductButton" 
                                data-modal-target="updateKendaraan" 
                                data-modal-toggle="updateKendaraan" 
                                >
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                  </svg>
                            </button>
                            <button id="deleteButton" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  text-center" type="button" wire:click="changeDelete({{ $item->id }})">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                  </svg>
                            </button>
                            
                            
                        </div>
                        
                        
                    </td>
                    @endif
                </tr> 
                @empty
                <tr class="bg-white border-b hover:bg-gray-50 text-black border text-center  border-gray-300">
                    <td colspan="11" class="px-3 py-4 text-center text-black">Tidak ada data kendaraan ditemukan</td>
                </tr> 
                @endforelse
                
            </tbody>
        </table>
    </div>
    <div class="pt-4">
        {{ $kendaraans->links('pagination::tailwind') }}
        {{-- {{ $drivers->links() }} --}}
    </div>
    @include('admin.modal.kendaraan')
</div>