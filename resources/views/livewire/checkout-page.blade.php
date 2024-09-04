<div class="mx-auto w-full flex-grow border-y border-gray-200 bg-gray-100 px-4 py-10 shadow-md dark:border-gray-700 dark:bg-slate-800 sm:px-6 lg:px-8">
    <div class="mx-auto w-full max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8">
        <h1 class="mb-4 text-2xl font-bold text-gray-800 dark:text-white">
            Checkout
        </h1>
        <form wire:submit.prevent="placeOrder">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-12 lg:col-span-8">
                    <!-- Card -->
                    <div class="rounded-xl bg-white p-4 shadow dark:bg-slate-900 sm:p-7">
                        <!-- Shipping Address -->
                        <div class="mb-6">
                            <h2 class="mb-2 text-xl font-bold text-gray-700 underline dark:text-white">
                                Shipping Address
                            </h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="mb-1 block text-gray-700 dark:text-white" for="first_name">
                                        First Name
                                    </label>
                                    <input wire:model="first_name"
                                        class="@error('first_name') @enderror w-full rounded-lg border border-gray-300 px-3 py-2 dark:border-none dark:bg-gray-700 dark:text-white"
                                        id="first_name" type="text">
                                    </input>
                                    @error('first_name')
                                        <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label class="mb-1 block text-gray-700 dark:text-white" for="last_name">
                                        Last Name
                                    </label>
                                    <input wire:model="last_name"
                                        class="@error('last_name') @enderror w-full rounded-lg border border-gray-300 px-3 py-2 dark:border-none dark:bg-gray-700 dark:text-white"
                                        id="last_name" type="text">
                                    </input>
                                    @error('last_name')
                                        <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="mb-1 block text-gray-700 dark:text-white" for="phone">
                                    Phone
                                </label>
                                <input wire:model="phone"
                                    class="@error('phone') @enderror w-full rounded-lg border border-gray-300 px-3 py-2 dark:border-none dark:bg-gray-700 dark:text-white"
                                    id="phone" type="text">
                                </input>
                                @error('phone')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label class="mb-1 block text-gray-700 dark:text-white" for="street_address">
                                    Street Address
                                </label>
                                <input wire:model="street_address"
                                    class="@error('street_address') @enderror w-full rounded-lg border border-gray-300 px-3 py-2 dark:border-none dark:bg-gray-700 dark:text-white"
                                    id="street_address" type="text">
                                </input>
                                @error('street_address')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label class="mb-1 block text-gray-700 dark:text-white" for="city">
                                    City
                                </label>
                                <input wire:model="city"
                                    class="@error('city') @enderror w-full rounded-lg border border-gray-300 px-3 py-2 dark:border-none dark:bg-gray-700 dark:text-white"
                                    id="city" type="text">
                                </input>
                                @error('city')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4 grid grid-cols-2 gap-4">
                                <div>
                                    <label class="mb-1 block text-gray-700 dark:text-white" for="state">
                                        State
                                    </label>
                                    <input wire:model="state"
                                        class="@error('state') @enderror w-full rounded-lg border border-gray-300 px-3 py-2 dark:border-none dark:bg-gray-700 dark:text-white"
                                        id="state" type="text">
                                    </input>
                                    @error('state')
                                        <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label class="mb-1 block text-gray-700 dark:text-white" for="zip"
                                        @error('zip_code') border-red-500 @enderror>
                                        ZIP Code
                                    </label>
                                    <input wire:model="zip_code"
                                        class="w-full rounded-lg border border-gray-300 px-3 py-2 dark:border-none dark:bg-gray-700 dark:text-white"
                                        id="zip_code" type="text">
                                    </input>
                                    @error('zip_code')
                                        <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 text-lg font-semibold text-gray-700 dark:text-white">
                            Select Payment Method
                        </div>
                        <ul class="grid w-full gap-6 md:grid-cols-2">
                            <li>
                                <input wire:model="payment_method" class="peer hidden" id="payment_method1" type="radio"
                                    value="cod" />
                                <label
                                    class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border border-gray-200 bg-white p-5 text-gray-500 hover:bg-gray-100 hover:text-gray-600 peer-checked:border-blue-600 peer-checked:text-blue-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:peer-checked:text-blue-500"
                                    for="payment_method1">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold dark:text-white">
                                            Cash on Delivery
                                        </div>
                                    </div>
                                    <svg aria-hidden="true" class="ms-3 h-5 w-5 rtl:rotate-180" fill="none"
                                        viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                        </path>
                                    </svg>
                                </label>
                            </li>
                            <li>
                                <input wire:model="payment_method" class="peer hidden" id="payment_method2" type="radio"
                                    value="midtrans">
                                <label
                                    class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border border-gray-200 bg-white p-5 text-gray-500 hover:bg-gray-100 hover:text-gray-600 peer-checked:border-blue-600 peer-checked:text-blue-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:peer-checked:text-blue-500"
                                    for="payment_method2">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold dark:text-white">
                                            Midtrans
                                        </div>
                                    </div>
                                    <svg aria-hidden="true" class="ms-3 h-5 w-5 rtl:rotate-180" fill="none"
                                        viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                        </path>
                                    </svg>
                                </label>
                                </input>
                            </li>
                        </ul>
                        @error('payment_method')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Card -->
                </div>
                <div class="col-span-12 md:col-span-12 lg:col-span-4">
                    <div class="rounded-xl bg-white p-4 shadow dark:bg-slate-900 sm:p-7">
                        <div class="mb-2 text-xl font-bold text-gray-700 underline dark:text-white">
                            ORDER SUMMARY
                        </div>
                        <div class="mb-2 flex justify-between font-bold text-gray-700 dark:text-white">
                            <span>
                                Subtotal
                            </span>
                            <span>
                                {{ Number::currency($grand_total, 'IDR') }}
                            </span>
                        </div>
                        <div class="mb-2 flex justify-between font-bold text-gray-700 dark:text-white">
                            <span>
                                Taxes
                            </span>
                            <span>
                                {{ Number::currency(0, 'IDR') }}
                            </span>
                        </div>
                        <div class="mb-2 flex justify-between font-bold text-gray-700 dark:text-white">
                            <span>
                                Shipping Cost
                            </span>
                            <span>
                                {{ Number::currency(0, 'IDR') }}
                            </span>
                        </div>
                        <hr class="my-4 h-1 rounded bg-slate-400 dark:bg-slate-700">
                        <div class="mb-2 flex justify-between font-bold text-gray-700 dark:text-white">
                            <span>
                                Grand Total
                            </span>
                            <span>
                                {{ Number::currency($grand_total, 'IDR') }}
                            </span>
                        </div>
                        </hr>
                    </div>
                    <button type="submit"
                        class="mt-4 w-full rounded-lg bg-green-500 p-3 text-lg text-white hover:bg-green-600 dark:bg-green-700 dark:hover:bg-green-800"
                        id="pay-button">
                        <span wire:loading.remove>Place order</span>
                        <span wire:loading>Processing...</span>
                    </button>
                    <div class="mt-4 rounded-xl bg-white p-4 shadow dark:bg-slate-900 sm:p-7">
                        <div class="mb-2 text-xl font-bold text-gray-700 underline dark:text-white">
                            BASKET SUMMARY
                        </div>
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">
                            @foreach ($cart_items as $items)
                                <li class="py-3 sm:py-4" wire:key='{{ $items['product_id'] }}'>
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img alt="{{ $items['name'] }}" class="h-12 w-12 rounded-full"
                                                src="{{ url('storage', $items['image']) }}">
                                            </img>
                                        </div>
                                        <div class="ms-4 min-w-0 flex-1">
                                            <p class="truncate text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $items['name'] }}
                                            </p>
                                            <p class="truncate text-sm text-gray-500 dark:text-gray-400">
                                                Quantity: {{ $items['quantity'] }}
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            {{ Number::currency($items['total_amount'], 'IDR') }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @if ($payment_method == 'midtrans' && isset($snapToken))
                <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                    data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
                <script type="text/javascript">
                    document.getElementById('pay-button').onclick = function() {
                        // SnapToken acquired from previous step
                        snap.pay('{{ $snapToken }}');
                    };
                </script>
            @endif
        </form>
    </div>
</div>
