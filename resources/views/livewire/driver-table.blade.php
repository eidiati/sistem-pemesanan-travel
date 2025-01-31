@php
use Carbon\carbon;
@endphp
<div>
    <div class="border relative overflow-x-auto shadow-md sm:rounded-lg flex items-center flex-column flex-wrap md:flex-row space-y-4 md:space-y-0  bg-white">
{{-- <div class="border relative overflow-x-auto shadow-md sm:rounded-lg flex items-center"> --}}
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-center text-black uppercase bg-gray-200  border  border-gray-300">
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
                        Nama Driver
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No SIM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kontak
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Masuk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    @if(Auth::user()->id_role == 1)
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($drivers as $driver)
                <tr class="bg-white hover:bg-gray-50 text-gray-900  border  border-gray-300 text-center">
                    {{-- <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td> --}}
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{-- {{ $loop->iteration}} --}}
                        {{$drivers->firstItem() + $loop->index}}
                    </th>
                    <td class="px-6 py-4">
                        {{ $driver->user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $driver->no_sim}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $driver->user->no_hp}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $driver->user->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{ Carbon::parse($driver->hire_date)->translatedFormat(' d F Y')}}
                    </td>
                    <td class="px-6 py-4">
                        @if($driver->status == "tidak_aktif")
                            Tidak Aktif
                        @else
                            Aktif
                        @endif
                    </td>
                    @if(Auth::user()->id_role == 1)
                    <td class="px-6 py-3">
                        <div class="flex items-center space-x-4">
                            <button type="button" class="block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  text-center"
                                wire:click="changeEdit({{ $driver->id }})"
                                id="updateProductButton" 
                                data-modal-target="updateDriver" 
                                data-modal-toggle="updateDriver" 
                                >
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                            </button>
                            <button id="deleteButton" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="block text-white  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center " type="button" wire:click="changeDelete({{ $driver->id }})">
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
                    <td colspan="11" class="px-3 py-4 text-center text-black">Tidak ada data driver ditemukan</td>
                </tr> 
                @endforelse
                
            </tbody>
        </table>
    </div>
    <!-- Pagination Links -->
    <div class="pt-4">
        {{ $drivers->links('pagination::tailwind') }}
        {{-- {{ $drivers->links() }} --}}
    </div>
    
    @include('admin.modal.driver')
</div>