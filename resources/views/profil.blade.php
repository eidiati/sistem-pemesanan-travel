@extends('layout.head')
@extends('layout.mainuser')

@section('container')

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{-- card --}}
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="grid grid-rows-1">
                <h3 class="text-xl font-bold tracking-tight daark:text-white text-center pb-6">Detail Profil</h3>
                {{-- card 1--}}
                <div class="grid grid-cols-1">
                    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 space-y-4 md:space-y-6">
                        <div class="grid grid-cols-2">
                            <p>Nama Pelanggan</p>
                            <p>Aditya Saputra</p>
                            <p>No. Hp</p>
                            <p>081234567890</p>
                            <p>Email</p>
                            <p>adityasaputra@gmail.com</p>
                            <p>Jenis Kelamin</p>
                            <p>Laki - Laki</p>
                            <p>Alamat</p>
                            <p>Jl. Srikandi RT 01/RW 02/No. 14</p>
                        </div>
                    </div>
                    <div class="justify-self-center md:justify-self-end mt-6">
                        <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Edit Profil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
