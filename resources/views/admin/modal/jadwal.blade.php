
{{-- Create Modal --}}
<div id="createJadwal" tabindex="-1" aria-hidden="true" class="inset-0 bg-black bg-opacity-50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Tambah Jadwal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="createJadwal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('admin.jadwal.create') }}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Keberangkatan</label>
                        <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Isi Tanggal Keberangkatan" required=""  @error('tanggal') is-invalid @enderror">
                        @error('tanggal') 
                            <div class="error">{{ $message }}</div>  
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="jam" class="block mb-2 text-sm font-medium text-gray-900">Jam Keberangkatan</label>
                        <input type="time" name="jam" id="jam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Isi jam Keberangkatan" required="" @error('jam') is-invalid @enderror>
                        @error('jam') 
                            <div class="error">{{ $message }}</div> 
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="asal_id" class="block mb-2 text-sm font-medium text-gray-900">Kota Asal</label>
                        <select name="asal_id" id="asal_id" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{old('asal_id')}}">
                            <option value="" disabled selected>Pilih</option>
                            @foreach ($rute as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kota }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="col-span-2">
                        <label for="tujuan_id" class="block mb-2 text-sm font-medium text-gray-900">Kota Tujuan</label>
                        <select name="tujuan_id" id="tujuan_id" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{old('tujuan_id')}}">
                            <option value="" disabled selected>Pilih</option>
                            @foreach ($rute as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kota }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="col-span-2">
                        <label for="kendaraan_id" class="block mb-2 text-sm font-medium text-gray-900">Kendaraan</label>
                        <select name="kendaraan_id" id="kendaraan_id" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{old('kendaraan_id')}}">
                            <option value="" disabled selected>Pilih</option>
                            @foreach ($kendaraan as $item)
                                <option value="{{ $item->id }}">{{ $item->plat_nomor }} - {{ $item->merk }} {{ $item->model }}</option>
                            @endforeach
                        </select>   
                    </div>
                    {{-- <div class="col-span-2">
                        <label for="driver_id" class="block mb-2 text-sm font-medium text-gray-900">Driver</label>
                        <select name="driver_id" id="driver_id" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{old('driver_id')}}">
                            <option value="" disabled selected>Pilih</option>
                            @foreach ($driver as $item)
                                <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                            @endforeach
                        </select>   
                    </div> --}}
                    <div class="col-span-2">
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">harga Keberangkatan</label>
                        <input type="text" type-currency="IDR" name="harga" id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Rp" required="" @error('harga') is-invalid @enderror>
                        @error('harga') 
                            <div class="error">{{ $message }}</div> 
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="kuota" class="block mb-2 text-sm font-medium text-gray-900">Kuota</label>
                        <input type="number" name="kuota" id="kuota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Isi jumlah kuota" required="" @error('kuota') is-invalid @enderror>
                        @error('kuota') 
                            <div class="error">{{ $message }}</div> 
                        @enderror
                    </div>
   
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                   Tambah
                </button>
            </form>
        </div>
    </div>
</div> 

{{-- Edit Modal --}}
<div wire:ignore.self id="updateJadwal" tabindex="-1" aria-hidden="true" class="inset-0 bg-black bg-opacity-50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                <h3 class="text-lg font-semibold text-gray-900">
                    Edit Jadwal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="updateJadwal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form wire:submit.prevent="editJadwal" >
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                        <input type="date" id="tanggal" wire:model="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Isi Tanggal Keberangkatan" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="jam" class="block mb-2 text-sm font-medium text-gray-900">Jam</label>
                        <input type="time" name="jam" id="jam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" wire:model="jam" placeholder="Isi jam berangkat" required="">
                        
                    </div>
                    <div class="col-span-2">
                        <label for="asal_id" class="block mb-2 text-sm font-medium text-gray-900">Kota Asal</label>
                        <select name="asal_id" id="asal_id" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{old('asal_id')}}" wire:model="asal_id">
                            <option value="" disabled selected>Pilih</option>
                            @foreach ($rute as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kota }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="col-span-2">
                        <label for="tujuan_id" class="block mb-2 text-sm font-medium text-gray-900">Kota Tujuan</label>
                        <select name="tujuan_id" id="tujuan_id" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{old('tujuan_id')}}" wire:model="tujuan_id">
                            <option value="" disabled selected>Pilih</option>
                            @foreach ($rute as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kota }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="col-span-2">
                        <label for="kendaraan_id" class="block mb-2 text-sm font-medium text-gray-900">Kendaraan</label>
                        <select name="kendaraan_id" wire:model="kendaraan_id" id="kendaraan_id" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{old('kendaraan_id')}}">
                            <option value="" disabled selected>Pilih</option>
                            @foreach ($kendaraan as $item)
                                <option value="{{ $item->id }}">{{ $item->plat_nomor }} - {{ $item->merk }} {{ $item->model }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="col-span-2">
                        <label for="driver_id" class="block mb-2 text-sm font-medium text-gray-900">Driver</label>
                        <select name="driver_id" id="driver_id" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{old('driver_id')}}" wire:model="driver_id" disabled readonly>
                            <option value="" disabled selected>Pilih</option>
                            @foreach ($driver as $item)
                                <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="col-span-2">
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">harga Keberangkatan</label>
                        <input type="text" type-currency="IDR" name="harga" id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" wire:model="harga" placeholder="Rp" required="" @error('harga') is-invalid @enderror>
                        @error('harga') 
                            <div class="error">{{ $message }}</div> 
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="kuota" class="block mb-2 text-sm font-medium text-gray-900">Kuota</label>
                        <input type="number" name="kuota" id="kuota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Isi jumlah kuota" required="" wire:model="kuota" @error('kuota') is-invalid @enderror>
                        @error('kuota') 
                            <div class="error">{{ $message }}</div> 
                        @enderror
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
    </div>
</div>
  

{{-- Delete Modal --}}
<!-- Main modal -->
<div wire:ignore.self id="deleteModal" tabindex="-1" aria-hidden="true" class="inset-0 bg-black bg-opacity-50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <p class="mb-4 text-gray-500 dark:text-gray-300">Apakah anda yakin ingin menghapus jadwal ini?</p>
            <div class="flex justify-center items-center space-x-4">
                <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Tidak
                </button>
                    <button type="button" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900" wire:click="deleteJadwal()">
                        Ya, saya yakin
                    </button>
            </div>
        </div>
    </div>
</div>

{{-- Modal Update Status --}}
<div wire:ignore.self id="updateStatus" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-0 rounded-t border-b sm:mb-5">
                
                <h3 class="text-lg font-semibold text-gray-900">
                    Perbarui Status Keberangkatan
                </h3>
                
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="updateStatus">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <p class="mb-4 text-black dark:text-gray-300">Apakah driver sudah berangkat?</p>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="delete" type="button" class="py-2 px-3 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-black focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Belum
                        </button>
                            <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-900" wire:click="changeStatus1()">
                                Ya, sudah
                            </button>
                    </div>
             
            </div>
           
            {{-- @endforeach --}}

                
            {{-- <div class="flex items-center justify-end mt-4 space-x-4"> --}}
                {{-- @if($statusBayar == 'Sedang Diverifikasi') --}}
                    {{-- <button type="submit" wire:click="updateStatus()" class="text-white bg-gray-700 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" >
                        Perbarui Status
                    </button> --}}
                    
                {{-- @else
                @endif
                    --}}
                {{-- <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Delete
                </button> --}}
            {{-- </div> --}}
            
        </div>
    </div>
</div>

<div wire:ignore.self id="updateStatus2" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-0 rounded-t border-b sm:mb-5">
                
                <h3 class="text-lg font-semibold text-gray-900">
                    Perbarui Status Keberangkatan
                </h3>
                
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="updateStatus2">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <p class="mb-4 text-black dark:text-gray-300">Apakah driver sudah selesai mengantarkan semua penumpang?</p>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="delete" type="button" class="py-2 px-3 text-sm font-medium text-gray-600  rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Belum
                        </button>
                            <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-900" wire:click="changeStatus2()">
                                Ya, sudah
                            </button>
                    </div>
            </div>
           
            {{-- @endforeach --}}

                
            {{-- <div class="flex items-center justify-end mt-4 space-x-4"> --}}
                {{-- @if($statusBayar == 'Sedang Diverifikasi') --}}
                    {{-- <button type="submit" wire:click="updateStatus()" class="text-white bg-gray-700 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" >
                        Perbarui Status
                    </button> --}}
                    
                {{-- @else
                @endif
                    --}}
                {{-- <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Delete
                </button> --}}
            {{-- </div> --}}
            
        </div>
    </div>
</div>