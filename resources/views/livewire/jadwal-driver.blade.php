@php
    use Carbon\Carbon;
@endphp

<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-xs md:text-sm text-left rtl:text-right text-gray-500  border  border-gray-300">
            <thead class="text-xs text-center text-black uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-2 py-3 w-3">
                        No.
                    </th>
                    <th scope="col" class="px-3 py-3 w-4">
                        Tanggal
                    </th>
                    <th scope="col" class="px-2 py-3 w-3">
                        Jam
                    </th>
                    <th scope="col" class="px-3 py-3 w-6">
                        Rute
                    </th>
                    <th scope="col" class="px-6 py-3 w-5">
                        Kendaraan/Plat
                    </th>
                    <th scope="col" class="px-6 py-3 w-8">
                        Tarif
                    </th>
                    <th scope="col" class="px-3 py-3 w-5">
                        Kuota
                    </th>
                    <th scope="col" class="px-3 py-3 w-5">
                        Status
                    </th>
                    {{-- <th scope="col" class="px-6 py-3">
                        Aksi
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @php
                    // $filterJadwals = $jadwals->filter(function ($jadwals) {
                    //     return in_array($jadwals->status, ['dijadwalkan', 'proses']);
                    // });
                @endphp
                @if($driver->isEmpty())
                <tr>
                    <td colspan="9" class="px-3 py-4 text-center text-black">Tidak ada jadwal keberangkatan yang aktif</td>
                </tr>
                @else
                @foreach($driver as $item)
                <tr class="bg-white text-black hover:bg-gray-50 text-center  border  border-gray-300">
                    <th scope="row" class="px-1 py-4 font-medium whitespace-nowrap">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-3 py-4">
                        {{ Carbon::parse($item->tanggal)->translatedFormat('D, d M Y')}}
                    </td>
                    <td class="px-2 py-4">
                        {{ Carbon::parse($item->jam)->translatedFormat('H.i') }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $item->asal->nama_kota }} - {{ $item->tujuan->nama_kota }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->kendaraan->merk}} {{ $item->kendaraan->model}} - {{ $item->kendaraan->plat_nomor }}
                    </td>
                    <td class="px-3 py-4">
                        Rp {{number_format(floatval($item->harga), 0, ',', '.')}}
                        
                        {{-- Rp {{ number_format($item->harga, 0, ',', '.') }} --}}
                    </td>
                    <td class="px-3 py-4">
                        {{ $item->kuota_terisi}} / {{ $item->kuota }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $statuses[$item->status] ?? 'Status Tidak Tersedia' }}
                    </td>
                    
                </tr>
                @endforeach
                
                @endif
            </tbody>
        </table>
    </div>

    <div class="pt-4">
        {{ $driver->links('pagination::tailwind') }}
        {{-- {{ $drivers->links() }} --}}
    </div>

</div>
