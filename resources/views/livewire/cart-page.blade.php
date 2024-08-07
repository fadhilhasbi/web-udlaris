<div class="mx-auto w-full flex-grow border-y border-gray-200 bg-gray-100 px-4 py-10 dark:border-gray-700 dark:bg-slate-800 sm:px-6 lg:px-8">
    <div class="container mx-auto px-4">
        <h1 class="mb-4 text-2xl font-semibold text-gray-900 dark:text-gray-100">Shopping Cart</h1>
        <div class="flex flex-col gap-4 md:flex-row">
            <div class="w-full md:w-3/4">
                <div class="mb-4 overflow-x-auto rounded-lg bg-white p-4 shadow-md dark:bg-slate-900">
                    <!-- For larger screens -->
                    <table class="hidden w-full min-w-max md:table">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold text-gray-900 dark:text-gray-100">Product</th>
                                <th class="text-left font-semibold text-gray-900 dark:text-gray-100">Price</th>
                                <th class="text-left font-semibold text-gray-900 dark:text-gray-100">Quantity</th>
                                <th class="text-left font-semibold text-gray-900 dark:text-gray-100">Total</th>
                                <th class="text-left font-semibold text-gray-900 dark:text-gray-100">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart_items as $item)
                                <tr wire:key="{{ $item['product_id'] }}">
                                    <td class="py-4 text-gray-900 dark:text-gray-100">
                                        <div class="flex items-center">
                                            <img class="mr-4 h-16 w-16" src="{{ url('storage', $item['image']) }}" alt="{{ $item['name'] }}">
                                            <span class="font-semibold">{{ $item['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 text-gray-900 dark:text-gray-100">{{ Number::currency($item['unit_amount'], 'IDR') }}</td>
                                    <td class="py-4 text-gray-900 dark:text-gray-100">
                                        <div class="flex items-center">
                                            <button wire:click="decreaseQty({{ $item['product_id'] }})" class="mr-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-gray-900 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:hover:bg-gray-700">-</button>
                                            <span class="w-8 text-center text-gray-900 dark:text-gray-100">{{ $item['quantity'] }}</span>
                                            <button wire:click="increaseQty({{ $item['product_id'] }})" class="ml-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-gray-900 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:hover:bg-gray-700">+</button>
                                        </div>
                                    </td>
                                    <td class="py-4 text-gray-900 dark:text-gray-100">{{ Number::currency($item['total_amount'], 'IDR') }}</td>
                                    <td>
                                        <button wire:click="removeItem({{ $item['product_id'] }})" class="rounded-lg border-2 border-slate-400 bg-slate-300 px-3 py-1 text-gray-900 hover:border-red-700 hover:bg-red-500 hover:text-white dark:border-slate-800 dark:bg-slate-600 dark:text-gray-100 dark:hover:border-red-800 dark:hover:bg-red-600">
                                            <span wire:loading.remove wire:target="removeItem({{ $item['product_id'] }})">Remove</span>
                                            <span wire:loading wire:target="removeItem({{ $item['product_id'] }})">Removing...</span>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 text-center text-4xl font-semibold text-slate-500 dark:text-gray-400">
                                        Keranjang masih kosong <br> Silahkan pilih produk dahulu
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- For smaller screens -->
                    <div class="block space-y-4 md:hidden">
                        @forelse ($cart_items as $item)
                            <div class="mb-4 flex flex-col rounded-lg bg-gray-50 p-4 shadow-md dark:bg-gray-800">
                                <div class="mb-4 flex items-center">
                                    <img class="mr-4 h-16 w-16 rounded-lg" src="{{ url('storage', $item['image']) }}" alt="{{ $item['name'] }}">
                                    <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $item['name'] }}</span>
                                </div>
                                <div class="mb-2 flex justify-between text-gray-900 dark:text-gray-100">
                                    <span class="font-semibold">Price:</span>
                                    <span>{{ Number::currency($item['unit_amount'], 'IDR') }}</span>
                                </div>
                                <div class="mb-2 flex justify-between text-gray-900 dark:text-gray-100">
                                    <span class="font-semibold">Quantity:</span>
                                    <div class="flex items-center">
                                        <button wire:click="decreaseQty({{ $item['product_id'] }})" class="mr-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-gray-900 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:hover:bg-gray-700">-</button>
                                        <span class="w-8 text-center text-gray-900 dark:text-gray-100">{{ $item['quantity'] }}</span>
                                        <button wire:click="increaseQty({{ $item['product_id'] }})" class="ml-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-gray-900 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:hover:bg-gray-700">+</button>
                                    </div>
                                </div>
                                <div class="mb-2 flex justify-between text-gray-900 dark:text-gray-100">
                                    <span class="font-semibold">Total:</span>
                                    <span>{{ Number::currency($item['total_amount'], 'IDR') }}</span>
                                </div>
                                <button wire:click="removeItem({{ $item['product_id'] }})" class="rounded-lg border-2 border-slate-400 bg-slate-300 px-3 py-1 text-gray-900 hover:border-red-700 hover:bg-red-500 hover:text-white dark:border-slate-800 dark:bg-slate-600 dark:text-gray-100 dark:hover:border-red-800 dark:hover:bg-red-600">
                                    <span wire:loading.remove wire:target="removeItem({{ $item['product_id'] }})">Remove</span>
                                    <span wire:loading wire:target="removeItem({{ $item['product_id'] }})">Removing...</span>
                                </button>
                            </div>
                        @empty
                            <div class="py-4 text-center text-xl font-semibold text-slate-500 dark:text-gray-400">
                                Keranjang masih kosong <br> Silahkan pilih produk dahulu
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="md:w-1/4">
                <div class="rounded-lg bg-white p-6 shadow-md dark:bg-slate-900">
                    <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Summary</h2>
                    <div class="mb-2 flex justify-between text-gray-900 dark:text-gray-100">
                        <span>Subtotal</span>
                        <span>
                            {{ Number::currency($grand_total, 'IDR') }}
                        </span>
                    </div>
                    <div class="mb-2 flex justify-between text-gray-900 dark:text-gray-100">
                        <span>Taxes</span>
                        <span>
                            {{ Number::currency(0, 'IDR') }}
                        </span>
                    </div>
                    <div class="mb-2 flex justify-between text-gray-900 dark:text-gray-100">
                        <span>Shipping</span>
                        <span>
                            {{ Number::currency(0, 'IDR') }}
                        </span>
                    </div>
                    <hr class="my-2 border-gray-300 dark:border-gray-700">
                    <div class="mb-2 flex justify-between text-gray-900 dark:text-gray-100">
                        <span class="font-semibold">Total</span>
                        <span class="font-semibold">
                            {{ Number::currency($grand_total, 'IDR') }}
                        </span>
                    </div>
                    @if ($cart_items)
                        <a href="checkout" class="mt-4 block w-full rounded-lg bg-blue-500 px-4 py-2 text-center text-white hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800">Checkout</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
