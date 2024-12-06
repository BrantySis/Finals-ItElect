<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
        {{ __('Tenants') }}
    </h2>
</x-slot>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <!-- Flash Message -->
        @if (session()->has('message'))
            <div class="bg-green-500 text-black p-4 rounded-md mb-4">
                {{ session('message') }}
            </div>
        @endif
            <div class="mb-4">
                <a href="{{ route('tenants.create') }}" class="inline-block px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                    Create New Tenant
                </a>
            </div>

             

<div class="container mx-auto p-4">
    <!-- Search bar -->
    <div>
                <x-search placeholder="Search Tenants.." wire:model.live.debounce.500="search" />
            </div>

    <!-- Table to display tenants -->
    <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
            <thead class="bg-gray-50 dark:bg-neutral-700">
                <tr>
                    <th scope="col" class="py-3 px-4 pe-0">
                        <div class="flex items-center h-5">
                            
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Tenant Name</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Apartment</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Room Number</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Contact</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Email</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                @foreach($tenants as $tenant)
                    <tr>
                        <td class="py-3 ps-4">
                            <div class="flex items-center h-5">
                                <input id="hs-table-pagination-checkbox-{{ $tenant->id }}" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                <label for="hs-table-pagination-checkbox-{{ $tenant->id }}" class="sr-only">Checkbox</label>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $tenant->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $tenant->room->apartment->name }}</td> <!-- Display apartment name -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $tenant->room->room_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $tenant->contact }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $tenant->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                        <button wire:click="deleteTenant({{ $tenant->id }})" class="bg-yellow-500 text-red p-2 rounded">Delete|</button>
                        
                            <a href="{{ route('tenants.edit', $tenant->id) }}">|Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination links -->
    <div class="mt-4">
        {{ $tenants->links() }} <!-- This will show pagination links -->
        
    </div>
    {{-- Spinner --}}
            <x-spinner wire:loading />
            {{-- End Spinner --}}
</div>





