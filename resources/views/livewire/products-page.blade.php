<div class="mx-auto w-full flex-grow border-y border-gray-200 bg-gray-100 px-4 py-10 dark:border-gray-700 dark:bg-gray-700 sm:px-6 lg:px-8">
    <div class="mx-auto w-full max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8">
        <section class="font-poppins rounded-lg bg-gray-50 py-10 dark:bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 py-4 md:px-6 lg:py-6">
                <div class="-mx-3 mb-24 flex flex-wrap">
                    <div class="w-full pr-2 lg:block lg:w-1/4">
                        <div class="mb-5 border border-gray-200 bg-white p-4 dark:border-gray-900 dark:bg-gray-900">
                            <h2 class="text-2xl font-bold dark:text-gray-400">Categories</h2>
                            <div class="mb-6 w-16 border-b border-rose-600 pb-2 dark:border-gray-400"></div>
                            <ul>
                                @foreach ($categories as $category)
                                    <li class="mb-4" wire:key="{{ $category->id }}">
                                        <label for="{{ $category->slug }}" class="flex items-center dark:text-gray-400">
                                            <input type="checkbox" wire:model.live="selected_categories"
                                                id="{{ $category->slug }}" value="{{ $category->id }}" class="mr-2 h-4 w-4">
                                            <span class="text-lg">{{ $category->name }}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mb-5 border border-gray-200 bg-white p-4 dark:border-gray-900 dark:bg-gray-900">
                            <h2 class="text-2xl font-bold dark:text-gray-400">Product Status</h2>
                            <div class="mb-6 w-16 border-b border-rose-600 pb-2 dark:border-gray-400"></div>
                            <ul>
                                <li class="mb-4">
                                    <label for="featured" class="flex items-center dark:text-gray-300">
                                        <input type="checkbox" wire:model.live="featured" id="featured" value="1"
                                            class="mr-2 h-4 w-4">
                                        <span class="text-lg dark:text-gray-400">Featured Products</span>
                                    </label>
                                </li>
                                <li class="mb-4">
                                    <label for="on_sale" class="flex items-center dark:text-gray-300">
                                        <input type="checkbox" wire:model.live="on_sale" id="on_sale" value="1"
                                            class="mr-2 h-4 w-4">
                                        <span class="text-lg dark:text-gray-400">On Sale</span>
                                    </label>
                                </li>
                            </ul>
                        </div>

                        <div class="mb-5 border border-gray-200 bg-white p-4 dark:border-gray-900 dark:bg-gray-900">
                            <h2 class="text-2xl font-bold dark:text-gray-400">Price</h2>
                            <div class="mb-6 w-16 border-b border-rose-600 pb-2 dark:border-gray-400"></div>
                            <div>
                                <div class="font-semibold dark:text-gray-400">{{ Number::currency($price_range, 'IDR') }}</div>
                                <input type="range" wire:model.live="price_range"
                                    class="mb-4 h-1 w-full cursor-pointer appearance-none rounded bg-blue-100"
                                    max="500000" value="300000" step="1000">
                                <div class="flex justify-between">
                                    <span class="inline-block text-lg font-bold text-green-600">{{ Number::currency(1000, 'IDR') }}</span>
                                    <span class="inline-block text-lg font-bold text-green-600">{{ Number::currency(500000, 'IDR') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-3 lg:w-3/4">
                        <div class="mb-4 px-3">
                            <div class="hidden items-center justify-between bg-gray-100 px-3 py-2 dark:bg-gray-900 md:flex">
                                <div class="flex items-center justify-between">
                                    <select wire:model.live="sort"
                                        class="block w-40 cursor-pointer bg-gray-100 text-base dark:bg-gray-900 dark:text-gray-400">
                                        <option value="latest">Sort by latest</option>
                                        <option value="price">Sort by Price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center">
                            @foreach ($products as $product)
                                <div class="mb-6 w-full px-3 sm:w-1/2 md:w-1/3" wire:key="{{ $product->id }}">
                                    <div class="border border-gray-300 dark:border-gray-700">
                                        <div class="relative bg-gray-200">
                                            <a href="/products/{{ $product->slug }}" class="">
                                                <img src="{{ url('storage', $product->image[0]) }}"
                                                    alt="{{ $product->name }}" class="mx-auto h-56 w-full object-cover">
                                            </a>

                                            {{-- Show "Produk tidak tersedia" if stock is <= 0 --}}
                                            @if ($product->in_stock <= 0)
                                                <div class="absolute inset-0 flex items-center justify-center bg-red-500 bg-opacity-75 text-white font-bold">
                                                    Produk tidak tersedia
                                                </div>
                                            @endif
                                        </div>

                                        <div class="p-3">
                                            <div class="mb-2 flex items-center justify-between gap-2">
                                                <h3 class="text-xl font-medium dark:text-gray-400">{{ $product->name }}</h3>
                                            </div>
                                            <p class="text-lg">
                                                <span class="text-green-600 dark:text-green-600">{{ Number::currency($product->price, 'IDR') }}</span>
                                            </p>
                                        </div>

                                        {{-- Disable the Add to Cart button if stock is <= 0 --}}
                                        <div class="flex justify-center border-t border-gray-300 p-4 dark:border-gray-700">
                                            @if ($product->in_stock > 0)
                                                <a wire:click.prevent="addToCart({{ $product->id }})" href="#"
                                                    class="flex items-center space-x-2 text-gray-500 hover:text-red-500 dark:text-gray-400 dark:hover:text-red-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cart3 h-4 w-4" viewBox="0 0 16 16">
                                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                                    </svg>
                                                    <span wire:loading.remove wire:target="addToCart({{ $product->id }})">Add to Cart</span>
                                                    <span wire:loading wire:target="addToCart({{ $product->id }})">Adding...</span>
                                                </a>
                                            @else
                                                <span class="text-red-500 font-bold">Out of Stock</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- pagination start -->
                        <div class="mt-6 flex justify-end">
                            {{ $products->links() }}
                        </div>
                        <!-- pagination end -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
