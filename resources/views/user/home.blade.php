@extends('layout.head')
@extends('layout.main')

@section('container')

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h4 class="text-xl pb-4">Selamat Datang, {{ Auth::user()->name }}</h4>

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
        
        <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-6 justify-items-center ">
            @if(Auth::user()->id_role == 3)
            {{-- card 1--}}
            <div class="w-2/3">
                <a href="{{ route('jadwal')}}" class="block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <img src="{{ asset('image/home_schedule.png')}}" class="w-1/2 mx-auto" alt="">
                </a>
                <h3 class="pt-4 mb-2 text-xl font-bold tracking-tight daark:text-white text-center">Informasi Jadwal Keberangkatan</h3>
            </div>
            {{-- card 1--}}
            <div class="w-2/3">
                <a href="{{ route('pesan-travel')}}" class="block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <img src="{{ asset('image/home_order.png')}}" class="w-1/2 mx-auto" alt="">
                </a>
                <h3 class="pt-4 mb-2 text-xl font-bold tracking-tight daark:text-white text-center">Pesan Travel</h3>
            </div>
            @elseif(Auth::user()->id_role == 2)
            <div class="w-2/3">
                <a href="{{ route('driver.jadwal')}}" class="block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <img src="{{ asset('image/home_schedule.png')}}" class="w-1/2 mx-auto" alt="">
                </a>
                <h3 class="pt-4 mb-2 text-xl font-bold tracking-tight daark:text-white text-center">Informasi Jadwal Keberangkatan</h3>
            </div>
            {{-- card 1--}}
            <div class="w-2/3">
                <a href="{{ route('driver.penumpang') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <img src="{{ asset('image/home_people.png')}}" class="w-1/2 mx-auto" alt="">
                </a>
                <h3 class="pt-4 mb-2 text-xl font-bold tracking-tight daark:text-white text-center">Data Penumpang</h3>
            </div>
            @endif
        </div>
    </div>
</main>

@endsection
