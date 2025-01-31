@extends('layout.head')
@extends('layout.main')

@section('container')

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
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
        
        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <label for="table-search" class="sr-only">Search</label>
                <form method="get" action="">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
        
                        <input type="text" id="search" value="{{ request('keyword') }}" name="keyword"  class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" autocomplete="off" placeholder="Search for items" oninput="this.form.submit()">
                    </div>
                </form>
            </div>
            @livewire('data-penumpang')
        </div>
        <div class="pt-4">
            {{ $data->links('pagination::tailwind') }}
            {{-- {{ $drivers->links() }} --}}
        </div>
        
    </div>
    
    
</main>

<script>
//     function openModal(button) {
//     var userName = button.getAttribute('data-name');
//     var userId = button.getAttribute('data-id');
//     var status = button.getAttribute('data-status');
    
//     // Menampilkan nama pengguna di dalam modal
//     if(status == 'penjemputan') {
//         document.getElementById('modalText').innerText = 'Apakah anda sudah melakukan penjemputan penumpang atas nama ' + userName + '?';
//     } else {
//         document.getElementById('modalText').innerText = 'Apakah anda sudah selesai melakukan pengantaran atas nama ' + userName + '?';
//     }
    
//     // Menyesuaikan action form dengan ID yang sesuai
//     var formAction = '/update-status/' + userId; // Ganti dengan rute yang sesuai
//     document.getElementById('statusForm').action = formAction;
    
//     // Menampilkan modal
//     document.getElementById('statusModal').classList.remove('hidden');
// }

// function closeModal() {
//     // Menutup modal
//     document.getElementById('statusModal').classList.add('hidden');
// }

</script>
@endsection