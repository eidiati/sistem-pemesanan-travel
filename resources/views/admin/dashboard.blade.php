@extends('layout.head')
@extends('layout.main')

@section('container')

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h4 class="text-xl pb-4">Selamat Datang, Admin</h4>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">

            {{-- card 1--}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white text-right">40</h2>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-right">Pemesanan</p>
                </a>
            </div>

            {{-- card 2--}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white text-right">40</h2>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-right">Rute</p>
                </a>
            </div>
            {{-- card 3 --}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white text-right">40</h2>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-right">Driver</p>
                </a>
            </div>
            {{-- card 4 --}}
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h2 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white text-right">40</h2>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-right">Kendaraan</p>
                </a>
            </div>
        </div>
    </div>
</main>

@endsection
