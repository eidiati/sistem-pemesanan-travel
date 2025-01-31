@extends('layout.head')
@extends('layout.main')

@section('container')

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{-- <h4 class="text-xl pb-4">Selamat Datang, {{ Auth::user()->name }}</h4> --}}
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

        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
            <label for="table-search" class="sr-only">Search</label>
            <form method="get" action="">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
    
                    <input type="text" id="search" value="{{ request('search') }}" name="search"  class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" autocomplete="off" placeholder="Search for items" oninput="this.form.submit()">
                </div>
            </form>
            
            @if(Auth::user()->id_role == 1)
            <div class="p-3 justify-items-center">
                
                <!-- Modal toggle -->
                <button data-modal-target="createCity" data-modal-toggle="createCity" class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                    Tambah
                </button>
                
            </div>
            @endif
           
        </div>

        {{-- Table --}}
        {{-- <div class="flex justify-between">
            <div class="p-3">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>
            <div class="p-3 justify-items-center">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 mb-2">Tambah</button>
            </div>
        </div> --}}
        
        @livewire("rute-table", ['rutes' => $rutes])
        
    </div>

    

    

    
  
</main>

<script>
    
    // const create = document.querySelector('.create');
    // const showModal = document.querySelector('.showModal');
    // const closeModal = document.querySelector('.closeModal');

    // showModal.addEventListener('click', function(){
    //     create.classList.remove('hidden');
    // });

    // closeModal.addEventListener('click', function(){
    //     create.classList.add('hidden');
    // });

    // $(document).on('click', '#updateProductButton', function(){
    //     let id = $(this).data('id');
    //     let namakota = $(this).data('namakota');
    //     let desc = $(this).data('desc');

    //     $('#edit-id').val(id);
    //     $('#edit-namakota').val(namakota);
    //     $('#edit-desc').text(desc);

    // });

    // $(document).ready(function(){

    //     // on modal show
    //     $('#updateCity').on('show.bs.modal', function() {
    //         var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
    //         var row = el.closest(".data-row");

    //         var id = el.data('item-id');
    //         var name = row.children(".name").text();
    //         var description = row.children(".description").text();

    //         // fill the data in the input fields
    //         $("#edit-id").val(id);
    //         $("#edit-namakota").val(name);
    //         $("#edit-desc").val(description);

    //     })

    //     // on modal hide
    //     $('#edit-modal').on('hide.bs.modal', function() {
    //         $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    //         $("#edit-form").trigger("reset");
    //     })
    // })
</script>
@endsection