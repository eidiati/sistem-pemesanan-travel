@extends('layout.head')
@extends('layout.main')

@section('container')

@php
use Carbon\Carbon;
@endphp

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{-- error/succes --}}
        @if ($errors->any())
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50">
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
        @if(Auth::user()->id_role == 3)
            @if($pesanan->metode_bayar == 'transfer' && $pesanan->status_bayar == 'Belum Lunas')
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                        <span class="sr-only">Info</span>
                    <div>
                        Silahkan lakukan pembayaran melalui bank yang tersedia. Untuk mengetahui bank, silahkan klik "Lihat Bukti Bayar"
                    </div>
                </div>
            @elseif($pesanan->metode_bayar == 'cash' && $pesanan->status_bayar != 'Lunas')
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                        <span class="sr-only">Info</span>
                    <div>
                        Silahkan lakukan pembayaran melalui driver!
                    </div>
                </div>
            @endif
        @endif

        {{-- card --}}
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="grid grid-rows-1">
                <h3 class="text-xl font-bold tracking-tight daark:text-white text-center pb-6">Kode Pesanan : {{ $pesanan->kode_pemesanan }}</h3>
                {{-- card 1--}}
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 space-y-4 md:space-y-6">
                        <div class="grid grid-cols-2 text-xs md:text-base gap-x-4">
                            <p>Nama Pelanggan</p>
                            <p>{{ $pesanan->user->name}}</p>
                            <p>No. Hp Pemesan</p>
                            <p>{{ $pesanan->no_hp}}</p>
                            <p>Kota Asal</p>
                            <p>{{ $pesanan->asal->nama_kota }}</p>
                            <p>Alamat Penjemputan</p>
                            <p>{{ $pesanan->alamat_jemput}}</p>
                            <p>Kota Tujuan</p>
                            <p>{{ $pesanan->tujuan->nama_kota}}</p>
                            <p>Alamat Tujuan</p>
                            <p>{{ $pesanan->alamat_tujuan}}</p>
                            <p>Jumlah Kursi</p>
                            <p>{{ $pesanan->kursi}}</p>
                            <p>Mobil</p>
                            <p>{{ $pesanan->jadwal->kendaraan->merk}} {{$pesanan->jadwal->kendaraan->model}} - {{ $pesanan->jadwal->kendaraan->plat_nomor}} </p>
                        </div>
                          
                    </div>

                    {{-- card 1--}}
                    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 space-y-4 md:space-y-6">
                        <div class="grid grid-cols-2 text-xs md:text-base gap-x-4">
                            <p>Nama Driver</p>
                            <p>{{ $pesanan->jadwal->kendaraan->driver->user->name}}</p>
                            <p>No. Hp Driver</p>
                            <p>{{ $pesanan->jadwal->kendaraan->driver->user->no_hp}}</p>
                            
                            <p>Tanggal Keberangkatan</p>
                            <p>{{ Carbon::parse($pesanan->jadwal->tanggal)->format('d F Y') }} </p>
                            <p>Jam keberangkatan</p>
                            <p>{{ Carbon::parse($pesanan->jadwal->jam)->format('H:i')}}</p>
                            <p>Biaya Pemesanan</p>
                            <p>{{ 'Rp. ' . number_format($pesanan->harga), 0,',','.'}}</p>
                            <p>Metode Pembayaran</p>
                            <p>
                                @if ($pesanan->metode_bayar == 'transfer')
                                    Transfer
                                @else
                                    Cash
                                @endif

                            </p>
                            <p>Status Pembayaran</p>
                            <p>{{ $pesanan->status_bayar}}</p>
                            <p>Status Penjemputan</p>
                            <p>{{ $statuses[$pesanan->status_pesanan]}}</p>   
                            <p>Bukti Transfer</p>
                            <p>
                                {{-- <img src="{{ asset('storage/' . $pesanan->bukti_bayar) }}" alt="{{$pesanan->bukti_bayar}}"> --}}
                                <button wire:click="changeEdit" 
                                {{-- ('{{ asset('uploads/bukti_bayar/' . $pesanan->bukti_bayar) }}')"  --}}
                                    class="px-4 py-2 bg-gray-700 text-white text-xs rounded-lg hover:bg-gray-800"
                                    data-modal-target="changeEdit" 
                                    data-modal-toggle="changeEdit">
                                Lihat Bukti Transfer
                            </button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-6 gap-6 ">
                <div class="">
                    <button type="button"  onclick="history.back()" class="flex text-white bg-gray-800 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        <svg class="w-[14px] h-[14px] text-white mr-2 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                        </svg>
                        Kembali
                    </button>
                </div>
                @auth 
                    @if (auth()->user()->id_role == 3 && $pesanan->metode_bayar == 'transfer')
                    @if($pesanan->status_bayar == 'Belum Lunas' || $pesanan->status_bayar == 'Belum Lunas (Ditolak)' )
                        <div class="justify-self-end">
                            <button type="button"  wire:click="uploadBukti()" class="flex text-white bg-gray-800 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5" data-modal-target="uploadBukti" 
                            data-modal-toggle="uploadBukti" >   
                                Upload Bukti Transfer
                            </button>
                        </div>
                    @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>

    {{-- Modal Upload --}}
    <div id="uploadBukti" tabindex="-1" aria-hidden="true" class="inset-0 bg-black bg-opacity-50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-sm md:text-lg font-semibold text-gray-900">
                        Upload Bukti Pembayaran
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="uploadBukti">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('bukti-bayar', $pesanan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 text-xs md:text-sm">
                            <label for="file" class="block mb-2 font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                            <input class="block w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="file" name="file" type="file" @error('file') is-invalid @enderror">

                            @error('file') 
                                <div class="error">{{ $message }}</div>  
                            @enderror
                        </div>
                        
                        {{-- <div class="col-span-2">
                            <label for="desc" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Kota</label>
                            <textarea id="desc" name="desc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Isi Deskripsi Kota"></textarea>                    
                        </div> --}}
                    </div>
                    <div class="justify-self-end">
                        <button type="submit" class="text-white inline-flex items-center bg-gray-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs md:text-sm px-5 py-2.5 text-center">
                            <svg class="w-6 h-6 text-white mr-2 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                              </svg>
                              
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

{{-- Modal Bukti Transfer --}}

<div wire:ignore.self id="changeEdit" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                <h3 class="text-lg font-semibold text-gray-900">
                    Bukti Transfer
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="changeEdit">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->

            <div class="flex items-center justify-center gap-4 mb-4 grid-cols-1">
                <div class="col-span-2">
                    @if($bukti)
                        <img src="{{ asset('uploads/bukti_bayar/' . $bukti) }}" alt="Bukti Transfer" class="max-w-40 rounded-lg">
                    @elseif($pesanan->metode_bayar == 'cash' && $pesanan->status_bayar == 'Belum Lunas')
                        <p>Silahkan lakukan pembayaran ke driver</p>
                    @elseif($pesanan->metode_bayar == 'cash' && $pesanan->status_bayar == 'Lunas')
                        <p>Pembayaran anda sudah lunas melalui driver</p>
                    @elseif(!$bukti && $pesanan->status_bayar == 'Belum Lunas')
                        <p>
                            Pembayaran dapat dilakukan melalui :<br>
                            Bank BNI : 1146394879 a.n SYAHRUL
                        </p>
                    @elseif($pesanan->status_bayar = 'Belum Lunas (Ditolak)')
                        <p>Pembayaran anda ditolak karena tidak sesuai. Silahkan unggah bukti bayar kembali.</p>
                    @endif
                </div>
            </div>
                
            
        </div>
    </div>
</div>

@endsection
