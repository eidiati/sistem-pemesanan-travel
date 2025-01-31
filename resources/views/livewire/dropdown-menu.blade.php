<div>
    <button wire:click="toggle" class="relative flex items-center rounded-full bg-gray-800 text-sm focus:outline-none">
        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
        <span class="px-3 py-2 text-sm font-medium text-gray-300">{{ auth()->user()->name }}</span>
    </button>

    @if($isOpen)
        <div class="absolute my-2  origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <form action="/logout" method="post" class="mb-1">  
                @csrf
                <button class="block px-4 py-2 text-sm text-gray-700">Log Out</button>
            </form>
        </div>
    @endif
</div>
