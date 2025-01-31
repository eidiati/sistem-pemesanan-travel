<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemesanan Travel - Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .judul {
            font-size: 12px;
            margin-bottom: 10px;
        }
        p {
            margin: 2px;
        }
        .judul h2 {
            text-align: center;
            font-size: 14px
        }
        .kop-surat {
            text-align: center;
            margin-bottom: 30px;
        }
        .kop-surat h1 {
            font-size: 18px;
            margin: 0;
            font-weight: bold;
        }
        .kop-surat p {
            font-size: 14px;
            margin: 0;
        }
        .line {
            border-top: 2px solid black;
            margin: 10px 0;
            padding: 1px 0;
            border-bottom: 2px solid black;
        }
        .table-container {
            width: 100%;
            border-collapse: collapse;
            
        }
        .table-container th, .table-container td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }
        .table-container th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    @php
        use Carbon\carbon;
    @endphp
    <div class="kop-surat">
        <h1>BMP GROUP TRAVEL</h1>
        <p>Jl. Lintas Timur, Kec. Mengkapan, Kab. Siak, Riau</p>
        <p>Tel: (0761) 123456</p>
        <div class="line"></div>
    </div>

    <div class="judul">
        <h2>Laporan Penjualan Travel </h2>
        <p>Periode : {{Carbon::parse($startDate)->translatedFormat('d M Y')}} - {{Carbon::parse($endDate)->translatedFormat('d M Y')}} </p>
        <p>Dicetak oleh : {{ auth()->user()->name }}</p>
        {{-- <p>Rute : </p> --}}
    </div>

    <table class="table-container">
        <thead>
            <tr style="text-align: center">
                <th style="width: 2%">No</th>
                <th>Kode Pesanan</th>
                <th>Nama Pemesan</th>
                <th>Rute</th>
                <th>Jadwal Keberangkatan</th>
                <th style="width: 13%">Mobil</th>
                <th>Driver</th>
                <th>Jumlah Kursi</th>
                <th style="width: 13%">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kode_pemesanan}}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->asal->nama_kota }} - {{$item->tujuan->nama_kota}} </td>
                    <td>{{Carbon::parse($item->jadwal->tanggal)->translatedFormat('d M Y')}} - {{ Carbon::parse($item->jadwal->jam)->translatedFormat('H.i') }}</td>
                    <td>{{ $item->jadwal->kendaraan->merk }} {{ $item->jadwal->kendaraan->model }} - {{ $item->jadwal->kendaraan->plat_nomor }} </td>
                    <td>{{ $item->jadwal->kendaraan->driver->user->name }}</td>
                    <td>{{ $item->kursi }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            <tr>
                <td colspan="8"><b>Total</b></td>
                <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Dokumen ini dibuat secara otomatis oleh sistem dan dinyatakan sah.</p>
    </div>
</body>
</html>
