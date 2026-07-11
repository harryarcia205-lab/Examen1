<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Create Client') }}
            </h2>
            <a href="{{ route('clients.index') }}" 
               class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Back to list
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('clients.store') }}" method="POST" novalidate>
                    @csrf

                    <!-- Full Name -->
                    <div class="mb-6">
                        <label for="full_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" maxlength="255"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('full_name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" maxlength="255"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-6">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" maxlength="255"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('phone_number')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Balance -->
                    <div class="mb-6">
                        <label for="balance" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Balance</label>
                        <input type="number" step="0.01" id="balance" name="balance" value="{{ old('balance') }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('balance')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Credit Limit -->
                    <div class="mb-6">
                        <label for="credit_limit" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Credit Limit</label>
                        <input type="number" step="0.01" id="credit_limit" name="credit_limit" value="{{ old('credit_limit') }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('credit_limit')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Discount -->
                    <div class="mb-6">
                        <label for="discount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Discount (%)</label>
                        <input type="number" step="0.01" id="discount" name="discount" value="{{ old('discount') }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('discount')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Registration Date -->
                    <div class="mb-6">
                        <label for="registration_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Registration Date</label>
                        <input type="date" id="registration_date" name="registration_date" value="{{ old('registration_date') }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('registration_date')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Client Status -->
                    <div class="mb-6">
                        <label for="client_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Client Status</label>
                        <input type="text" id="client_status" name="client_status" value="{{ old('client_status') }}" maxlength="20"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('client_status')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('clients.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Save Client
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

