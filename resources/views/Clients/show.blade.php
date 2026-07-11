<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('View Client') }}
            </h2>
            <a href="{{ route('clients.index') }}" 
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
                
                <!-- Full Name -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Full Name</h3>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $client->full_name }}</p>
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Email</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $client->email }}</p>
                </div>

                <!-- Phone Number -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Phone Number</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $client->phone_number }}</p>
                </div>

                <!-- Balance -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Balance</h3>
                    <p class="text-gray-700 dark:text-gray-300">${{ number_format($client->balance, 2) }}</p>
                </div>

                <!-- Credit Limit -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Credit Limit</h3>
                    <p class="text-gray-700 dark:text-gray-300">${{ number_format($client->credit_limit, 2) }}</p>
                </div>

                <!-- Discount -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Discount</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $client->discount }}%</p>
                </div>

                <!-- Registration Date -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Registration Date</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $client->registration_date }}</p>
                </div>

                <!-- Client Status -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Client Status</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $client->client_status }}</p>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline" id="form-delete-{{ $client->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $client->id }})" 
                                class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-red-200 dark:border-red-900/50 rounded-xl font-semibold text-xs text-red-600 dark:text-red-400 uppercase tracking-widest shadow-sm hover:bg-red-50 dark:hover:bg-red-900/20 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Delete
                        </button>
                    </form>

                    <a href="{{ route('clients.edit', $client) }}" 
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                        Edit Client
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

