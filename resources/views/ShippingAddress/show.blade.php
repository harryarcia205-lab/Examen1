<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('View Shipping Address') }}
            </h2>
            <a href="{{ route('addresses.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 border border-transparent rounded-xl font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to list
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <!-- Client ID -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Client ID</h3>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $address->client_id }}</p>
                </div>

                <!-- Number -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Number</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $address->number }}</p>
                </div>

                <!-- Street -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Street</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $address->street }}</p>
                </div>

                <!-- Neighborhood -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Neighborhood</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $address->neighborhood }}</p>
                </div>

                <!-- City -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">City</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $address->city }}</p>
                </div>

                <!-- Location Reference -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Location Reference</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $address->location_reference }}</p>
                </div>

                <!-- Address Status -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Address Status</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $address->address_status }}</p>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                    <form action="{{ route('addresses.destroy', $address) }}" method="POST" class="inline" id="form-delete-{{ $address->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $address->id }})" 
                                class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-red-200 dark:border-red-900/50 rounded-xl font-semibold text-xs text-red-600 dark:text-red-400 uppercase tracking-widest shadow-sm hover:bg-red-50 dark:hover:bg-red-900/20 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Delete
                        </button>
                    </form>

                    <a href="{{ route('addresses.edit', $address) }}" 
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                        Edit Address
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Delete permanently?',
                text: "This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Yes, delete',
                cancelButtonText: 'Cancel',
                background: '#1e293b',
                color: '#ffffff',
                customClass: {
                    popup: 'rounded-2xl border border-gray-700'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete-' + id).submit();
                }
            })
        }
    </script>
</x-app-layout>
