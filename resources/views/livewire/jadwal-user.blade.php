@php
    use Carbon\Carbon;
@endphp

<div>
    @if(Auth::user()->id_role == 3)
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">       
        <table class="w-full text-xs md:text-sm text-left rtl:text-right text-gray-500  border  border-gray-300">
            <thead class="text-xs text-center text-black uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-2 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Jam
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Asal
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Tujuan
                    </th>
                    <th scope="col" class="px-6 py-3 w-5">
                        Kendaraan/Plat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tarif
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Driver
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Kuota
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Status
                    </th>
                    {{-- <th scope="col" class="px-6 py-3">
                        Aksi
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @php
                    // $filterJadwals = $jadwal->filter(function ($jadwal) {
                    //     return in_array($jadwal->status, ['dijadwalkan', 'proses']);
                    // });
                @endphp
                @if($jadwal->isEmpty())
                <tr>
                    <td colspan="9" class="px-3 py-4 text-center text-black">Tidak ada jadwal keberangkatan yang aktif</td>
                </tr>
                @else
                @foreach($jadwal as $item)
                <tr class="bg-white text-black hover:bg-gray-50 text-center  border  border-gray-300">
                    <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-3 py-4">
                        {{ Carbon::parse($item->tanggal)->translatedFormat('D, d M Y')}}
                    </td>
                    <td class="px-2 py-4">
                        {{ Carbon::parse($item->jam)->translatedFormat('H.i') }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $item->asal->nama_kota }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $item->tujuan->nama_kota }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->kendaraan->merk}} {{ $item->kendaraan->model}} - {{ $item->kendaraan->plat_nomor }}
                    </td>
                    <td class="px-6 py-4 ">
                        Rp {{number_format(floatval($item->harga), 0, ',', '.')}}
                        
                        {{-- Rp {{ number_format($item->harga, 0, ',', '.') }} --}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->kendaraan->driver->user->name }}
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
        {{ $jadwal->links('pagination::tailwind') }}
        {{-- {{ $drivers->links() }} --}}
    </div>
        {{-- @include('admin.modal.jadwal') --}}

    @elseif(Auth::user()->id_role == 4)
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-xs md:text-sm text-left rtl:text-right text-gray-500  border  border-gray-300">
            <thead class="text-xs text-center text-black uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-2 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Jam
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Asal
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Tujuan
                    </th>
                    <th scope="col" class="px-6 py-3 w-5">
                        Kendaraan/Plat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tarif
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Driver
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Kuota
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $filterJadwals = $jadwal->filter(function ($jadwal) {
                        return in_array($jadwal->status, ['dijadwalkan', 'proses']);
                    });
                @endphp
                @if($filterJadwals->isEmpty())
                <tr>
                    <td colspan="9" class="px-3 py-4 text-center text-black">Tidak ada jadwal keberangkatan yang aktif</td>
                </tr>
                @else
                @foreach($filterJadwals as $item)
                <tr class="bg-white text-black hover:bg-gray-50 text-center  border  border-gray-300">
                    <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-3 py-4">
                        {{ Carbon::parse($item->tanggal)->translatedFormat('D, d M Y')}}
                    </td>
                    <td class="px-2 py-4">
                        {{ Carbon::parse($item->jam)->translatedFormat('H.i') }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $item->asal->nama_kota }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $item->tujuan->nama_kota }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->kendaraan->merk}} {{ $item->kendaraan->model}} - {{ $item->kendaraan->plat_nomor }}
                    </td>
                    <td class="px-6 py-4 ">
                        Rp {{number_format(floatval($item->harga), 0, ',', '.')}}
                        
                        {{-- Rp {{ number_format($item->harga, 0, ',', '.') }} --}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->kendaraan->driver->user->name }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $item->kuota_terisi}} / {{ $item->kuota }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $statuses[$item->status] ?? 'Status Tidak Tersedia' }}
                    </td>
                    <td class="px-6 py-4 w-4">
                            <a href="{{ route('owner.jadwal.detail', $item->id)}}" type="button" class="block text-white hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-xl ">
                                <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                            </a>
                    </td>
                    
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="pt-4">
        {{ $jadwal->links('pagination::tailwind') }}
        {{-- {{ $drivers->links() }} --}}
    </div>
    @endif
</div>
