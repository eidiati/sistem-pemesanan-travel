@extends('layout.head')
@extends('layout.main')

@section('container')

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        @if ($errors->any())
            <div class="alert alert-danger">
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

        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
            <p>Selamat datang di halaman laporan. Halaman ini dapat digunakan untuk mencetak laporan penjualan. <br>Untuk mencetak laporan penjualan, Silahkan pilih periode tanggal yang akan dicetak!</p>

        </div>
        @if(Auth::user()->id_role == 1)
        <form action="{{ route('admin.cetak') }}" method="post">
        @elseif(Auth::user()->id_role == 4)
        <form action="{{ route('owner.cetak') }}" method="post">
        @endif
        
            @csrf
            <div class="flex flex-col items-center md:flex-row  bg-white py-6 border border-black">
                <div class="px-3 w-full text-center mb-4 md:w-fit">
                    <p>Periode : </p>
                </div>
                <div class="w-full md:w-1/2 grid gap-4 grid-cols-2">
                    <div class="pl-3">
                        <label for="startDate" class="block text-center mb-2 text-sm font-medium text-gray-900">Tanggal Awal</label>
                        <input type="date" id="startDate" name="startDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  >
                    </div>
                    
                    <div class="pr-3">
                        <label for="endDate" class="block mb-2 text-center text-sm font-medium text-gray-900">Tanggal Akhir</label>
                        <input type="date" id="endDate" name="endDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  >                  
                    </div>
                </div>
                

            </div>
            <div class="p-3 justify-items-start">
                    
                <!-- Modal toggle -->
                <button class="hidden md:block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" name="export" value="pdf" type="submit">
                    Cetak Laporan Penjualan
                </button>
                <button class="md:hidden text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" name="export" value="pdf" type="submit">
                    Cetak 
                </button>

                
            </div>
        </form>
    </div>
</main>
@endsection