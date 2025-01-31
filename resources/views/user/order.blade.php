@extends('layout.head')
@extends('layout.main')

@section('container')

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{-- card --}}
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
            @if ($errors->any())
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-blue-300 rounded-lg bg-blue-50" role="alert">
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
            <form class="" action="{{ route('pesan-travel.create') }}" method="POST">
                @csrf
                <div class="grid grid-rows-1">
                    {{-- <h3 class="text-xl font-bold tracking-tight daark:text-white text-center pb-6">Informasi Jadwal Keberangkatan</h3> --}}
                    {{-- card 1--}}
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            
                        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow space-y-4 md:space-y-6">
                            <div class="">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Pemesan</label>
                                <input type="nama" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" readonly>
                            </div>
                            <div class="">
                                <label for="asal_id" class="block mb-2 text-sm font-medium text-gray-900">Kota Asal</label>
                                <select name="asal_id" id="asal_id" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                    <option value="" disabled selected>Pilih Kota</option>
                                    @foreach ($rute as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kota }}</option>
                                    @endforeach
                                </select>  
                            </div>
                            <div class="">
                                <label for="alamat_jemput" class="block mb-2 text-sm font-medium text-gray-900">Alamat Penjemputan</label>
                                <input type="text" name="alamat_jemput" id="alamat_jemput" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                            </div>
                            <div class="">
                                <label for="tujuan_id" class="block mb-2 text-sm font-medium text-gray-900">Kota Tujuan</label>
                                <select name="tujuan_id" id="tujuan_id" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                    <option value="" disabled selected>Pilih Kota</option>
                                    @foreach ($rute as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kota }}</option>
                                    @endforeach
                                </select>  
                            </div>
                            <div class="">
                                <label for="alamat_tujuan" class="block mb-2 text-sm font-medium text-gray-900">Alamat Pengantaran</label>
                                <input type="text" name="alamat_tujuan" id="alamat_tujuan" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                            </div>
                            
                        </div>
            
                        {{-- card 1--}}
                        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow space-y-4 md:space-y-6">
                            <div class="">
                                <label for="jadwal" class="block mb-2 text-sm font-medium text-gray-900">Pilih Jadwal</label>
                                <select name="jadwal_id" id="jadwal_id" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                    {{-- <option value="" disabled selected>Pilih Jadwal</option> --}}
                                    
                                    {{-- @foreach ($jadwals as $item)
                                        <option value="{{ $item->id }}">{{ $item->asal_id}} - {{ $item->tanggal }} - {{ $item->jam }}</option>
                                        
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="">
                                <label for="kursi" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Kursi</label>
                                <select name="kursi" id="kursi" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                    {{-- <option value="" disabled selected>Pilih Banyak Kursi</option> --}}
                                    
                                </select> 
                            </div>
                            <div class="">
                                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900">No. Hp</label>
                                <input type="no_hp" name="no_hp" id="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                            </div>
                            <div class="">
                                <label for="metode" class="block mb-2 text-sm font-medium text-gray-900">Metode Pembayaran</label>
                                <select name="metode_bayar" id="metode" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                    <option value="" disabled selected>Pilih Metode</option>
                                    <option value="transfer">Transfer</option>
                                    <option value="cash">Cash</option>
                                </select> 
                            </div>
                            <div class="">
                                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Total Pembayaran</label>
                                <input type="harga" name="harga" id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="justify-self-center md:justify-self-end mt-6">
                        <button type="submit" class="focus:outline-none text-white bg-gray-900 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Pesan Travel</button>
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</main>


<script>  
    document.addEventListener('DOMContentLoaded', function () {
        const namaInput = document.getElementById('nama');
        if(namaInput) {
            namaInput.value = "{{ $user->name }}";
        }
        document.getElementById('asal_id').addEventListener('change', function () {
            const asalId = this.value;
            // console.log(asalId);
            document.getElementById('tujuan_id').addEventListener('change', function () {
                const tujuanId = this.value;
                // console.log(tujuanId);
                if(asalId || tujuanId){ 
                    fetch('/jadwal_id/' + asalId +'/' + tujuanId )
                        .then(response => response.json())
                        .then(data => {
                            // const jadwalDropdown = document.getElementById('jadwal_id');
                            // jadwalDropdown.innerHTML = '<option value="">Select Jadwal</option>';
                            // data.forEach(jadwal => {
                            //     jadwalDropdown.innerHTML += `<option value="${jadwal.id}">${jadwal.tanggal} - ${jadwal.jam}</option>`;
                            // });
                            // console.log(data);
                            const testing = data.filter(item => item.status === 'dijadwalkan');
                            // console.log(testing);

                            const jadwalDropdown = document.getElementById('jadwal_id');
                            jadwalDropdown.replaceChildren();
                            
                            if(testing.length === 0) {
                                jadwalDropdown.append(new Option('Pilih Jadwal', ''));
                            } else if(testing.length > 0 && testing) {
                                jadwalDropdown.append(new Option('Pilih Jadwal', ''));
                                testing.forEach(jadwal => {
                                    const formattedDate = formatDate(jadwal.tanggal); 
                                    const formattedTime = formatTime(jadwal.jam);
                                    jadwalDropdown.innerHTML += `<option value="${jadwal.id}">${formattedDate} - ${formattedTime} - ${jadwal.kendaraan.merk} ${jadwal.kendaraan.model} - ${jadwal.kendaraan.plat_nomor}</option>`;
                                });

                            } else {
                                jadwalDropdown.replaceChildren();
                            }

                        
                        })
                        .catch(error => console.error('Error fetching cities:', error));
                } else {
                    jadwalDropdown.replaceChildren();
                }
            });

            document.getElementById('jadwal_id').addEventListener('change', function () {
                const jadwalId = this.value;
                // console.log(jadwalId);

                if(jadwalId) {
                    fetch(`/kuota/${jadwalId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);  // Menampilkan data yang diterima
                        const kuotaDropdown = document.getElementById('kursi');
                        kuotaDropdown.innerHTML = '';
                            if(data) {
                                let defaultOption = document.createElement('option');
                                defaultOption.text = 'Pilih Jumlah Kursi';
                                defaultOption.disabled = true;
                                defaultOption.selected = true;
                                kuotaDropdown.appendChild(defaultOption);

                                for (let i = 1; i <= data; i++) {
                                const option = document.createElement('option');
                                option.value = i;
                                option.textContent = i;
                                kuotaDropdown.append(option);
                    }
                            } else {
                                const option = document.createElement('option');
                                option.textContent = 'Kursi Penuh';
                                kuotaDropdown.appendChild(option);
                            }
                        })
                        .catch(error => {
                            console.error('Ada masalah dengan permintaan:', error);
                        });
                }
                document.getElementById('kursi').addEventListener('change', function () {
                    const jumlahKursi = parseInt(this.value);
                    // console.log(jadwalId);
    
                    if(jadwalId) {
                        fetch('/total/' + jadwalId)
                            .then(response => response.json())
                            .then(data => { 
                                const totalInput = document.getElementById('harga');
                                const total = data * jumlahKursi;
                                // totalInput.replaceChildren();
                                if(data) {
                                    // totalInput.value = 'Rp. ' + data.harga;
                                    
                                    totalInput.value = `Rp ${total.toLocaleString()}`;
    
                                // } else {
                                //     totalInput.value = 'Rp. 0';
                                }
                            })
                        
                    }
                    
    
                });

            });
            
        });

        function formatDate(inputDate) {
            const date = new Date(inputDate); // Konversi ke objek Date
            const day = String(date.getDate()).padStart(2, '0'); // Hari (2 digit)
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Bulan (2 digit)
            const year = date.getFullYear(); // Tahun (4 digit)
            return `${day}/${month}/${year}`; // Gabungkan dalam format DD/MM/YYYY
        }

        function formatTime(inputTime) {
            // Pisahkan jam dan menit dari input
            const [hour, minute] = inputTime.split(':').map(Number); // Konversi ke angka
            // const ampm = hour >= 12 ? 'PM' : 'AM'; // Tentukan AM/PM
            // const formattedHour = hour % 12 || 12; // Konversi ke format 12 jam
            return `${hour}:${String(minute).padStart(2, '0')}`; // Gabungkan
        }
    });

</script>
@endsection
