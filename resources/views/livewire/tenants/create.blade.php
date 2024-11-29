<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-8">
    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 mb-6">
        {{ __('Create Tenant') }}
    </h2>

    <form wire:submit.prevent="submit" class="space-y-6">
        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-4 rounded-md shadow-md">
                {{ session('message') }}
            </div>
        @endif

        <!-- Tenant Name -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tenant Name</label>
            <input type="text" id="name" wire:model="name" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-blue-400" required>
            @error('name') 
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Tenant Email -->
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tenant Email</label>
            <input type="email" id="email" wire:model="email" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-blue-400" required>
            @error('email') 
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Tenant Contact -->
        <div class="mb-6">
            <label for="contact" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tenant Contact</label>
            <input type="text" id="contact" wire:model="contact" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-blue-400" required>
            @error('contact') 
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
            @enderror
        </div>

       <!-- Select Room (Dropdown) -->
<div class="mb-6">
    <label for="room_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Room</label>
    <select id="room_id" wire:model="room_id" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-blue-400" required>
        <option value="" disabled>Select a room</option>
        @foreach($rooms as $room)
            <option value="{{ $room->id }}">
                {{ $room->room_number }} || {{ $room->apartment->name }} <!-- Assuming apartment has a 'name' field -->
            </option>
        @endforeach
    </select>
    @error('room_id')
        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
    @enderror
</div>

        <!-- Submit Button -->
        <div class="flex items-center space-x-4">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Create Tenant
            </button>
        </div>
    </form>
</div>


