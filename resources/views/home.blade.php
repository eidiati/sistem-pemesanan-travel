@extends('layout.head')
@extends('layout.mainuser')

@section('container')

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h4 class="text-xl pb-4">Selamat Datang, Adit</h4>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 ">

            {{-- card 1--}}
            <div class="">
                <a href="#" class="block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    {{-- tambahkan gambar --}}
                </a>
                <h3 class="pt-4 mb-2 text-xl font-bold tracking-tight daark:text-white text-center">Informasi Jadwal Keberangkatan</h3>
            </div>
            {{-- card 1--}}
            <div class="">
                <a href="#" class="block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    {{-- tambahkan gambar --}}
                </a>
                <h3 class="pt-4 mb-2 text-xl font-bold tracking-tight daark:text-white text-center">Pesan Travel</h3>
            </div>

        </div>
    </div>
</main>

@endsection
