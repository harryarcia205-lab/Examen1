<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Edit Order Line') }}
            </h2>
            <a href="{{ route('order_lines.index') }}" 
               class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Back to list
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('order_lines.update', $orderLine) }}" method="POST" onsubmit="confirmUpdate(event)" novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Article ID -->
                    <div class="mb-6">
                        <label for="article_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Article ID</label>
                        <input type="number" id="article_id" name="article_id" value="{{ old('article_id', $orderLine->article_id) }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('article_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Requested Quantity -->
                    <div class="mb-6">
                        <label for="requested_quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Requested Quantity</label>
                        <input type="number" id="requested_quantity" name="requested_quantity" value="{{ old('requested_quantity', $orderLine->requested_quantity) }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('requested_quantity')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Unit Price -->
                    <div class="mb-6">
                        <label for="unit_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Unit Price</label>
                        <input type="number" step="0.01" id="unit_price" name="unit_price" value="{{ old('unit_price', $orderLine->unit_price) }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('unit_price')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Line Subtotal -->
                    <div class="mb-6">
                        <label for="line_subtotal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Line Subtotal</label>
                        <input type="number" step="0.01" id="line_subtotal" name="line_subtotal" value="{{ old('line_subtotal', $orderLine->line_subtotal) }}"
                               class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('line_subtotal')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('order_lines.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Update Line
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
                text: "The order line will be updated.",
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
