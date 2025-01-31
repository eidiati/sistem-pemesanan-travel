{{-- navbar --}}
<body class=" h-full">
<div class="min-h-full">
    <nav x-data="{ isOpen: false }" class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            {{-- logo --}}
            <div class="flex-shrink-0">
              <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="BMP Group Travel">
            </div>
            {{-- nav --}}
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                @if(Auth::user()->id_role == 1)
                <x-navlink href="/admin/dashboard" :active="request()->is('admin/dashboard')">Dashboard</x-navlink>
                {{-- <x-navlink href="/admin/jadwal" :active="request()->is('admin/jadwal')">Jadwal</x-navlink> --}}
                {{-- <x-navlink href="/admin/pemesanan" :active="request()->is('admin/pemesanan')">Pemesanan</x-navlink> --}}
                <button id="jadwalSubMenu" data-dropdown-toggle="jadwalSub" class="{{ request()->is('admin/jadwal') || request()->is('admin/riwayat-jadwal') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} flex items-center justify-between w-full py-2 px-3 text-gray-300 text-sm rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:dark:hover:bg-transparent">Jadwal 
                  <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="jadwalSub" class="z-10 hidden font-normal bg-gray-800 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-300 dark:divide-gray-400">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                    <li>
                      <a href="/admin/jadwal" class="{{ request()->is('admin/jadwal') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Jadwal Aktif</a>

                    </li>
                    <li>
                      <a href="/admin/riwayat-jadwal" class="{{ request()->is('admin/riwayat-jadwal') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Riwayat Jadwal</a>

                    </li>
                    
                  </ul>
                  
                </div>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="{{ request()->is('admin/pemesanan') || request()->is('admin/riwayat-pesanan') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} flex items-center justify-between w-full py-2 px-3 text-gray-300 text-sm rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:dark:hover:bg-transparent">Pemesanan 
                  <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar" class="z-10 hidden font-normal bg-gray-800 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-300 dark:divide-gray-400">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                    <li>
                      <a href="/admin/pemesanan" class="{{ request()->is('admin/pemesanan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Pemesanan Aktif</a>

                    </li>
                    <li>
                      <a href="/admin/riwayat-pesanan" class="{{ request()->is('admin/riwayat-pesanan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Riwayat Pemesanan</a>

                    </li>
                    
                  </ul>
                  
                </div>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownData" class="{{ request()->is('admin/rute') || request()->is('admin/kendaraan') || request()->is('admin/driver') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} flex items-center justify-between w-full py-2 px-3 text-gray-300 text-sm rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:dark:hover:bg-transparent">Data 
                  <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownData" class="z-10 hidden font-normal bg-gray-800 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-300 dark:divide-gray-400">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                    <li>
                      <a href="/admin/rute" class="{{ request()->is('admin/rute') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Rute</a>
                    </li>
                    <li>
                      <a href="/admin/kendaraan" class="{{ request()->is('admin/kendaraan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Kendaraan</a>
                    </li>
                    <li>
                      <a href="/admin/driver" class="{{ request()->is('admin/driver') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Driver</a>
                    </li>  
                  </ul> 
                </div>
                <x-navlink href="/admin/laporan" :active="request()->is('admin/laporan')">Laporan</x-navlink>

                @elseif(Auth::user()->id_role == 2)
                <x-navlink href="/driver/dashboard" :active="request()->is('driver/dashboard')">Dashboard</x-navlink>
                <x-navlink href="/driver/jadwal" :active="request()->is('driver/jadwal')">Jadwal</x-navlink>  
                <x-navlink href="/driver/data-penumpang" :active="request()->is('driver/data-penumpang')">Data Penumpang</x-navlink>
                <x-navlink href="/driver/riwayat" :active="request()->is('driver/riwayat')">Riwayat Keberangkatan</x-navlink>

                @elseif(Auth::user()->id_role == 3)
                <x-navlink href="/home" :active="request()->is('home')">Beranda</x-navlink>
                <x-navlink href="/jadwal" :active="request()->is('jadwal')">Jadwal Travel</x-navlink>
                <x-navlink href="/pesan-travel" :active="request()->is('pesan-travel')">Pesan Travel</x-navlink>
                <x-navlink href="/pesan-aktif/{{ Auth::id() }}" :active="request()->is('pesan-aktif/*')">Pesanan Anda</x-navlink>
                <x-navlink href="/riwayat/{{Auth::id()}}" :active="request()->is('riwayat/*')">Riwayat</x-navlink>

                @elseif(Auth::user()->id_role == 4)
                <x-navlink href="/owner/dashboard" :active="request()->is('owner/dashboard')">Dashboard</x-navlink>
                {{-- <x-navlink href="/admin/jadwal" :active="request()->is('admin/jadwal')">Jadwal</x-navlink> --}}
                {{-- <x-navlink href="/admin/pemesanan" :active="request()->is('admin/pemesanan')">Pemesanan</x-navlink> --}}
                <button id="jadwalSubMenu" data-dropdown-toggle="jadwalSub" class="{{ request()->is('owner/jadwal') || request()->is('owner/riwayat-jadwal') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} flex items-center justify-between w-full py-2 px-3 text-gray-300 text-sm rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:dark:hover:bg-transparent">Jadwal 
                  <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="jadwalSub" class="z-10 hidden font-normal bg-gray-800 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-300 dark:divide-gray-400">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                    <li>
                      <a href="/owner/jadwal" class="{{ request()->is('owner/jadwal') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Jadwal Aktif</a>

                    </li>
                    <li>
                      <a href="/owner/riwayat-jadwal" class="{{ request()->is('owner/riwayat-jadwal') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Riwayat Jadwal</a>

                    </li>
                    
                  </ul>
                  
                </div>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="{{ request()->is('owner/pemesanan') || request()->is('owner/riwayat-pesanan') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} flex items-center justify-between w-full py-2 px-3 text-gray-300 text-sm rounded-md ">Pemesanan 
                  <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar" class="z-10 hidden font-normal bg-gray-800 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-300 dark:divide-gray-400">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                    <li>
                      <a href="/owner/pemesanan" class="{{ request()->is('owner/pemesanan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Pemesanan Aktif</a>

                    </li>
                    <li>
                      <a href="/owner/riwayat-pesanan" class="{{ request()->is('owner/riwayat-pesanan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Riwayat Pemesanan</a>

                    </li>
                    
                  </ul>
                  
                </div>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownData" class="{{ request()->is('owner/rute') || request()->is('owner/kendaraan') || request()->is('owner/driver') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}}  flex items-center justify-between w-full py-2 px-3 rounded-md text-sm">Data 
                  <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownData" class="z-10 hidden font-normal bg-gray-800 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-300 dark:divide-gray-400">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                    <li>
                      <a href="/owner/rute" class="{{ request()->is('owner/rute') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Rute</a>
                    </li>
                    <li>
                      <a href="/owner/kendaraan" class="{{ request()->is('owner/kendaraan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Kendaraan</a>
                    </li>
                    <li>
                      <a href="/owner/driver" class="{{ request()->is('owner/driver') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Driver</a>
                    </li>
                    
                  </ul>
                  
                </div>
                <x-navlink href="/owner/laporan" :active="request()->is('owner/laporan')">Laporan</x-navlink>
                @endif
              </div>
            </div>
          </div>

          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              
              <!-- Profile dropdown -->
              @auth
                  
              {{-- <div class="ml-3">
                <div>
                  <button @click="isOpen = !isOpen"  type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <span class="px-3 py-2 text-sm font-medium text-gray-300">{{ auth()->user()->name }}</span>
                  </button>
                  
                </div>
                
                
                
                <!--
                  Dropdown menu, show/hide based on menu state.
                  
                  Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
                -->
                <div x-show="isOpen" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <!-- Active: "bg-gray-100", Not Active: "" -->
                  
                  <form action="/logout" method="post">
                    @csrf
                    <button class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Log Out</button>
                </form>
                </div>
              </div> --}}
              <button data-dropdown-toggle="dropdownProfile" class="relative flex items-center rounded-full text-sm focus:outline-none">
                <svg class="w-6 h-6 text-gray-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                </svg>

                <span class="px-3 py-2 text-sm font-medium text-gray-300">{{ auth()->user()->name }}</span>
              </button>
              <div id="dropdownProfile" class="z-10 hidden font-normal bg-gray-800 divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-300 dark:divide-gray-400">
                <ul class="text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  <li>
                    <form action="{{ route('logout') }}" method="post">
                      @csrf
                       <button type="submit" class="{{ request()->is('logout') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:w-32 hover:text-start hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-sm font-medium" aria-current="logout">Logout</button>

                    </form>

                  </li>
                </ul>
              </div>

              {{-- @livewire('Dropdown-menu') --}}

            </div>
          </div>
          @endauth
          
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!-- Menu open: "hidden", Menu closed: "block" -->
              <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!-- Menu open: "block", Menu closed: "hidden" -->
              <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>
  
      <!-- Mobile menu, show/hide based on menu state. -->
      <div x-show="isOpen" class="block md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          @if(Auth::user()->id_role == 1)
          <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>

          <button id="dropdownNavbarLink" data-dropdown-toggle="subJadwal"  type="button" class="flex items-center justify-between w-full py-2 px-3 text-gray-300 text-base rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:dark:hover:bg-transparent">Jadwal 
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="subJadwal" class="z-10 hidden font-normal bg-gray-900 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-300 dark:divide-gray-400">
            <ul class="py-2 text-base text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="/admin/jadwal" class="{{ request()->is('admin/jadwal') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Jadwal Aktif</a>

              </li>
              <li>
                <a href="/admin/riwayat-jadwal" class="{{ request()->is('admin/riwayat-jadwal') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Riwayat Jadwal</a>

              </li>
              
            </ul>
            
          </div>
          <button id="dropdownNavbarLink" data-dropdown-toggle="pesanSub" class="flex items-center justify-between w-full py-2 px-3 text-gray-300 text-base rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:dark:hover:bg-transparent">Pemesanan 
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="pesanSub" class="z-10 hidden font-normal bg-gray-900 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-300 dark:divide-gray-400">
            <ul class="py-2 text-base text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="/admin/pemesanan" class="{{ request()->is('admin/pemesanan') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Pemesanan Aktif</a>

              </li>
              <li>
                <a href="/admin/riwayat-pesanan" class="{{ request()->is('admin/riwayat-pesanan') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Riwayat Pemesanan</a>

              </li>
              
            </ul>
            
          </div>
          {{-- <a href="/admin/jadwal" class="{{ request()->is('admin/jadwal') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Jadwal</a>
          <a href="/admin/pemesanan" class="{{ request()->is('admin/pemesanan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Pemesanan</a> --}}
          <a href="/admin/rute" class="{{ request()->is('admin/rute') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Rute</a>
          <a href="/admin/kendaraan" class="{{ request()->is('admin/kendaraan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Kendaraan</a>
          <a href="/admin/driver" class="{{ request()->is('admin/driver') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Driver</a>
          <a href="/admin/laporan" class="{{ request()->is('admin/laporan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Laporan</a>
         

          @elseif(Auth::user()->id_role == 2)
          <a href="/driver/dashboard" class="{{ request()->is('driver/dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
          <a href="/driver/jadwal" class="{{ request()->is('driver/jadwal') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Jadwal</a>
          <a href="/driver/data-penumpang" class="{{ request()->is('driver/data-penumpang') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Data Penumpang</a>
          <a href="/driver/riwayat" class="{{ request()->is('driver/riwayat') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Riwayat Keberangkatan</a>


          @elseif(Auth::user()->id_role == 3)
          <a href="/home" class="{{ request()->is('home') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Beranda</a>
          <a href="/jadwal" class="{{ request()->is('jadwal') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Jadwal</a>
          <a href="/pesan-travel" class="{{ request()->is('pesan.travel') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Pesan Travel</a>
          <a href="/pesan-aktif/{{ Auth::id() }}" class="{{ request()->is('pesan.aktif/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Pesanan Anda</a>
          <a href="/riwayat" class="{{ request()->is('riwayat') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Riwayat</a>

          @elseif(Auth::user()->id_role == 4)
          <a href="/owner/dashboard" class="{{ request()->is('owner/dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
          <button id="jadwalSubMenu" data-dropdown-toggle="jadwalSubMobile" class="{{ request()->is('owner/jadwal') || request()->is('owner/riwayat-jadwal') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} flex items-center justify-between w-full py-2 px-3 text-gray-300 text-base rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:dark:hover:bg-transparent">Jadwal 
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="jadwalSubMobile" class="z-10 hidden font-normal bg-gray-800 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-300 dark:divide-gray-400">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="/owner/jadwal" class="{{ request()->is('owner/jadwal') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Jadwal Aktif</a>

              </li>
              <li>
                <a href="/owner/riwayat-jadwal" class="{{ request()->is('owner/riwayat-jadwal') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Riwayat Jadwal</a>

              </li>
              
            </ul>
            
          </div>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNav" class="{{ request()->is('owner/pemesanan') || request()->is('owner/riwayat-pesanan') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} flex items-center justify-between w-full py-2 px-3 text-gray-300 text-base rounded-md ">Pemesanan 
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownNav" class="z-10 hidden font-normal bg-gray-800 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-300 dark:divide-gray-400">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="/owner/pemesanan" class="{{ request()->is('owner/pemesanan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Pemesanan Aktif</a>

              </li>
              <li>
                <a href="/owner/riwayat-pesanan" class="{{ request()->is('owner/riwayat-pesanan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Riwayat Pemesanan</a>

              </li>
              
            </ul>
            
          </div>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownDataMobile" class="{{ request()->is('owner/rute') || request()->is('owner/kendaraan') || request()->is('owner/driver') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}}  flex items-center justify-between w-full py-2 px-3 rounded-md text-base">Data 
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownDataMobile" class="z-10 hidden font-normal bg-gray-800 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-300 dark:divide-gray-400">
            <ul class="py-2 text-base text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="/owner/rute" class="{{ request()->is('owner/rute') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Rute</a>
              </li>
              <li>
                <a href="/owner/kendaraan" class="{{ request()->is('owner/kendaraan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Kendaraan</a>
              </li>
              <li>
                <a href="/owner/driver" class="{{ request()->is('owner/driver') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Driver</a>
              </li>
              
            </ul>
            
          </div>
          <a href="/owner/laporan" class="{{ request()->is('owner/laporan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Laporan</a>
          @endif
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              {{-- <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> --}}
              <svg class="w-6 h-6 text-gray-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">{{ auth()->user()->name }}</div>
            </div>
          </div>
          @auth
          <div class="mt-3 space-y-1 px-2">
            {{-- <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Profile</a> --}}
            <form action="/logout" method="post" class="mb-1">  
              @csrf
              <button class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Log Out</button>
            </form>
          </div>
          @endauth
        </div>
      </div>
    </nav>  

    <header class="bg-white shadow my-auto">
      <div class="mx-auto max-w-7xl px-2 py-3 sm:px-3 lg:px-4">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>
      </div>
    </header>

    <div class="container-fluid">

        @yield('container')

    </div>
    {{-- <script src="{{asset('/path/to/flowbite/dist/flowbite.min.js')}}"></script> --}}
    <script>
      function toggleMenu() {
          const menu = document.getElementById('menu');
          menu.classList.toggle('hidden');
      }
  </script>
</div>