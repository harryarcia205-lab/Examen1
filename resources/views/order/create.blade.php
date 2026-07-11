<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Create Order') }}
            </h2>
            <a href="{{ route('orders.index') }}" 
               class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Back to list
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('orders.store') }}" method="POST" novalidate>
                    @csrf

                    <!-- Client ID -->
                    <div class="mb-6">
                        <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Client ID</label>
                        <input type="number" id="client_id" name="client_id" value="{{ old('client_id') }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                               focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('client_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address ID -->
                    <div class="mb-6">
                        <label for="address_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Address ID</label>
                        <input type="number" id="address_id" name="address_id" value="{{ old('address_id') }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                               focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('address_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Creation DateTime -->
                    <div class="mb-6">
                        <label for="created_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Creation Date & Time</label>
                        <input type="datetime-local" id="created_at" name="created_at" value="{{ old('created_at') }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                               focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('created_at')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subtotal -->
                    <div class="mb-6">
                        <label for="subtotal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtotal</label>
                        <input type="number" step="0.01" id="subtotal" name="subtotal" value="{{ old('subtotal') }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                               focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('subtotal')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tax Amount -->
                    <div class="mb-6">
                        <label for="tax_amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tax Amount</label>
                        <input type="number" step="0.01" id="tax_amount" name="tax_amount" value="{{ old('tax_amount') }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                               focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('tax_amount')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Grand Total -->
                    <div class="mb-6">
                        <label for="grand_total" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Grand Total</label>
                        <input type="number" step="0.01" id="grand_total" name="grand_total" value="{{ old('grand_total') }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                               focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('grand_total')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Additional Notes -->
                    <div class="mb-6">
                        <label for="additional_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Additional Notes</label>
                        <textarea id="additional_notes" name="additional_notes" rows="3" maxlength="255"
                                  class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                                  focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">{{ old('additional_notes') }}</textarea>
                        @error('additional_notes')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order Status -->
                    <div class="mb-6">
                        <label for="order_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Order Status</label>
                        <input type="text" id="order_status" name="order_status" value="{{ old('order_status') }}" maxlength="20"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                               focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('order_status')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('orders.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Save Order
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

