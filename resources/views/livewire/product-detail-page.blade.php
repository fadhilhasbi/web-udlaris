<div class="mx-auto w-full flex-grow border-y border-gray-200 bg-white px-4 py-10 dark:border-gray-700 dark:bg-slate-800 sm:px-6 lg:px-8">
    <section class="font-poppins overflow-hidden py-11">
        <div class="mx-auto max-w-6xl px-4 py-4 md:px-6 lg:py-8">
            <div class="-mx-4 flex flex-wrap">
                <div class="mb-8 w-full md:mb-0 md:w-1/2" x-data="{ mainImage: '{{ url('storage', $product->image[0]) }}' }">
                    <div class="sticky top-0 z-50 overflow-hidden">
                        <div class="relative mb-6 lg:mb-10 lg:h-2/4">
                            <img x-bind:src="mainImage" alt="" class="w-full object-cover lg:h-full">
                        </div>
                        <div class="hidden flex-wrap md:flex">
                            @foreach ($product->image as $image)
                                <div class="w-1/2 p-2 sm:w-1/4" x-on:click="mainImage='{{ url('storage', $image) }}'">
                                    <img src="{{ url('storage', $image) }}" alt="{{ $product->name }}"
                                        class="w-full cursor-pointer object-cover hover:border hover:border-blue-500 lg:h-20">
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6 border-t border-gray-300 px-6 pb-6 dark:border-gray-400">
                            <div class="mt-6 flex flex-wrap items-center">
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-truck h-4 w-4 text-gray-700 dark:text-gray-400"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                                        </path>
                                    </svg>
                                </span>
                                <h2 class="text-lg font-bold text-gray-700 dark:text-gray-400">Free Shipping</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2">
                    <div class="lg:pl-20">
                        <div class="mb-8">
                            <h2 class="mb-6 max-w-xl text-2xl font-bold dark:text-gray-400 md:text-4xl">
                                {{ $product->name }}</h2>
                            <p class="mb-6 inline-block text-4xl font-bold text-gray-700 dark:text-gray-400">
                                <span>
                                    {{ Number::currency($product->price, 'IDR') }}
                                </span>
                                {{-- <span
                                    class="text-base font-normal text-gray-500 line-through dark:text-gray-400">Rp. 83.999</span> --}}
                            </p>
                            <p class="max-w-md text-gray-700 dark:text-gray-400">
                                {!! $product->description !!}
                            </p>
                        </div>
                        <div class="mb-8 w-32">
                            <label for=""
                                class="w-full border-b border-blue-300 pb-1 text-xl font-semibold text-gray-700 dark:border-gray-600 dark:text-gray-400">Quantity</label>
                            <div class="relative mt-6 flex h-10 w-full flex-row rounded-lg bg-transparent">
                                <button wire:click="decreaseQty"
                                    class="h-full w-20 cursor-pointer rounded-l bg-gray-300 text-gray-600 outline-none hover:bg-gray-400 hover:text-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <span class="m-auto text-2xl font-thin">-</span>
                                </button>
                                <input wire:model="quantity" type="number" readonly
                                    class="text-md flex w-full items-center border-none bg-gray-300 text-center font-semibold text-gray-700 placeholder-gray-700 outline-none hover:text-black focus:outline-none dark:bg-gray-900 dark:text-gray-400 dark:placeholder-gray-400"
                                    placeholder="1">
                                <button wire:click="increaseQty"
                                    class="h-full w-20 cursor-pointer rounded-r bg-gray-300 text-gray-600 outline-none hover:bg-gray-400 hover:text-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center gap-4">
                            <button
                            wire:click="addToCart({{ $product->id }})"
                                class="w-full rounded-md bg-blue-500 p-4 text-gray-50 hover:bg-blue-600 dark:bg-blue-500 dark:text-gray-200 dark:hover:bg-blue-700 lg:w-2/5">
                                <span wire:loading.remove wire:target="addToCart({{ $product->id }})">Add to cart</span><span wire:loading wire:target="addToCart({{ $product->id }})">Adding...</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
