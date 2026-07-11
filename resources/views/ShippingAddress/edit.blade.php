<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Edit Shipping Address') }}
            </h2>
            <a href="{{ route('addresses.index') }}" 
               class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Back to list
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('addresses.update', $address) }}" method="POST" onsubmit="confirmUpdate(event)" novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Client ID -->
                    <div class="mb-6">
                        <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Client ID</label>
                        <input type="number" id="client_id" name="client_id" value="{{ old('client_id', $address->client_id) }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('client_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Number -->
                    <div class="mb-6">
                        <label for="number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Number</label>
                        <input type="number" id="number" name="number" value="{{ old('number', $address->number) }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('number')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Street -->
                    <div class="mb-6">
                        <label for="street" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Street</label>
                        <input type="text" id="street" name="street" value="{{ old('street', $address->street) }}" maxlength="255"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('street')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Neighborhood -->
                    <div class="mb-6">
                        <label for="neighborhood" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Neighborhood</label>
                        <input type="text" id="neighborhood" name="neighborhood" value="{{ old('neighborhood', $address->neighborhood) }}" maxlength="255"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('neighborhood')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- City -->
                    <div class="mb-6">
                        <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">City</label>
                        <input type="text" id="city" name="city" value="{{ old('city', $address->city) }}" maxlength="255"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('city')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location Reference -->
                    <div class="mb-6">
                        <label for="location_reference" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Location Reference</label>
                        <input type="text" id="location_reference" name="location_reference" value="{{ old('location_reference', $address->location_reference) }}" maxlength="255"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('location_reference')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address Status -->
                    <div class="mb-6">
                        <label for="address_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Address Status</label>
                        <input type="text" id="address_status" name="address_status" value="{{ old('address_status', $address->address_status) }}" maxlength="255"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('address_status')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('addresses.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Update Address
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function confirmUpdate(event) {
            event.preventDefault(); 
            
            Swal.fire({
                title: 'Save changes?',
                text: "The shipping address will be updated.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, update',
                cancelButtonText: 'Cancel',
                background: '#1e293b',
                color: '#ffffff',
                customClass: {
                    popup: 'rounded-2xl border border-gray-700'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit(); 
                }
            })
        }
    </script>
</x-app-layout>
