<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
        {{ __('Home') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-3xl font-semibold text-center text-gray-800 dark:text-gray-100 mb-6">
                    Welcome to the Apartment Rental Dashboard
                </h3>
                
                <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                    <!-- Grid -->
                    <div class="grid gap-6 grid-cols-2 sm:gap-12 lg:grid-cols-2 lg:gap-8">
                        <!-- Rooms Available -->
                        <div class="flex flex-col items-center text-center">
    <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-neutral-200">Rooms Available</h4>
    <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-blue-600">{{ $roomsAvailable }}</p>
    <p class="mt-1 text-gray-500 dark:text-neutral-500">fully furnished rooms</p>
    <button 
        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        wire:click="fetchAvailableRooms">
        {{ $showRooms ? 'Hide Available Rooms' : 'View Available Rooms' }}
    </button>
</div>
                        <!-- Total Tenants -->
                        <div class="flex flex-col items-center text-center">
    <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-neutral-200">Tenants</h4>
    <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-blue-600">{{ $totalTenants }}</p>
    <p class="mt-1 text-gray-500 dark:text-neutral-500">currently renting</p>
    <button 
        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        wire:click="fetchTenants">
        {{ $showTenants ? 'Hide Tenants' : 'View Tenants' }}
    </button>
</div>
                    <!-- End Grid -->

                    <!-- Details Section -->
                    @if($showRooms)
                        <div class="mt-8">
                            <h4 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Available Rooms</h4>
                            <ul class="list-disc list-inside text-gray-600 dark:text-gray-400">
                                @foreach($availableRooms as $room)
                                    <li>{{ $room->room_number }} in Apartment {{ $room->apartment->id }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($showTenants)
                        <div class="mt-8">
                            <h4 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mt-6 mb-4">Tenants</h4>
                            <ul class="list-disc list-inside text-gray-600 dark:text-gray-400">
                                @foreach($tenants as $tenant)
                                    <li>{{ $tenant->name }} (Room {{ $tenant->room->room_number }})</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

