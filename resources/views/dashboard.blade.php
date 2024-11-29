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
                    
                    <!-- Location and Hospitality Section -->
                    <div class="space-y-6">
                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Apartment Location</h4>
                            <p class="mt-4 text-gray-600 dark:text-gray-400">
                                Our apartments are located in the heart of the city, offering easy access to local markets, restaurants, and entertainment centers. Whether you're looking for a quiet retreat or a vibrant neighborhood, our apartments provide the perfect balance of comfort and convenience.
                            </p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                Located just 10 minutes away from the nearest subway station, you're never far from everything you need. Our neighborhood is known for its safety, cleanliness, and community spirit, making it an ideal place to call home.
                            </p>
                        </div>

                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Hospitality Services</h4>
                            <p class="mt-4 text-gray-600 dark:text-gray-400">
                                We take pride in offering top-notch hospitality services to all our tenants. From the moment you arrive, you'll be greeted with warmth and attention. Our on-site team is always available to assist with any needs, from maintenance requests to local recommendations.
                            </p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                We also offer exclusive amenities such as a fully-equipped fitness center, free Wi-Fi throughout the building, and a 24/7 concierge service. Our goal is to make your stay as comfortable and stress-free as possible.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

