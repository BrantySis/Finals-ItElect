<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Dashboard') }}
            

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
  <div class="grid gap-6 grid-cols-2 sm:gap-12 lg:grid-cols-3 lg:gap-8">
    <!-- Stats -->
    <div>
      <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-neutral-200">Apartments</h4>
      <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-blue-600">99.95%</p>
      <p class="mt-1 text-gray-500 dark:text-neutral-500">in fulfilling orders</p>
    </div>
    <!-- End Stats -->

    <!-- Stats -->
    <div>
      <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-neutral-200">Rooms available</h4>
      <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-blue-600">7 rooms</p>
      <p class="mt-1 text-gray-500 dark:text-neutral-500">fully furnitured</p>
    </div>
    <!-- End Stats -->

    <!-- Stats -->
    <div>
      <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-neutral-200">Happy customer</h4>
      <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-blue-600">85%</p>
      <p class="mt-1 text-gray-500 dark:text-neutral-500">this year alone</p>
    </div>
    <!-- End Stats -->
  </div>
  <!-- End Grid -->
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

