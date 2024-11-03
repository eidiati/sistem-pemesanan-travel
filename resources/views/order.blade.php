@extends('layout.head')
@extends('layout.mainuser')

@section('container')

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{-- card --}}
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form class="" action="#">
                <div class="grid grid-rows-1">
                    <h3 class="text-xl font-bold tracking-tight daark:text-white text-center pb-6">Informasi Jadwal Keberangkatan</h3>
                    {{-- card 1--}}
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 space-y-4 md:space-y-6">
                            <div class="">
                                <label for="asal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota Asal</label>
                                <input type="asal" name="asal" id="asal" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                            </div>
                            <div class="">
                                <label for="jemput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Penjemputan</label>
                                <input type="jemput" name="jemput" id="jemput" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                            </div>
                            <div class="">
                                <label for="tujuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota Tujuan</label>
                                <input type="tujuan" name="tujuan" id="tujuan" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                            </div>
                            <div class="">
                                <label for="antar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Pengantaran</label>
                                <input type="antar" name="antar" id="antar" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                            </div>
                        </div>

                        {{-- card 1--}}
                        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 space-y-4 md:space-y-6">
                            <div class="">
                                <label for="jadwal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Jadwal</label>
                                <input type="jadwal" name="jadwal" id="jadwal" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                            </div>
                            <div class="">
                                <label for="kontak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Hp</label>
                                <input type="kontak" name="kontak" id="kontak" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                            </div>
                            <div class="">
                                <label for="metode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metode Pembayaran</label>
                                <input type="metode" name="metode" id="metode" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                            </div>
                            <div class="">
                                <label for="total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Pembayaran</label>
                                <input type="total" name="total" id="total" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                            </div>
                        </div>
                    </div>
                    <div class="justify-self-center md:justify-self-end mt-6">
                        <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Pesan Travel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
