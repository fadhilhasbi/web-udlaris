<section class="font-poppins flex items-center py-6 dark:bg-gray-800">
    <div
        class="mx-auto max-w-6xl flex-1 justify-center rounded-md border bg-white px-4 py-4 dark:border-gray-900 dark:bg-gray-900 md:px-10 md:py-10">
        <div>
            <h1 class="mb-8 px-4 text-2xl font-semibold tracking-wide text-gray-700 dark:text-gray-300">
                Thank you. Your order has been received.
            </h1>
            <div
                class="mb-8 flex h-full w-full items-stretch justify-start border-b border-gray-200 px-4 dark:border-gray-700 md:flex-row md:space-x-6 lg:space-x-8 xl:flex-col xl:space-x-0">
                <div class="flex flex-shrink-0 items-start justify-start">
                    <div class="flex w-full items-center justify-center space-x-4 pb-6 md:justify-start">
                        <div class="flex flex-col items-start justify-start space-y-2">
                            <p class="text-left text-lg font-semibold leading-4 text-gray-800 dark:text-gray-400">
                                {{ $order->address->first_name }} {{ $order->address->last_name }}
                            </p>
                            <p class="text-sm leading-4 text-gray-600 dark:text-gray-400">
                                {{ $order->address->street_address }}</p>
                            <p class="text-sm leading-4 text-gray-600 dark:text-gray-400">
                                {{ $order->address->city }}, {{ $order->address->state }},
                                {{ $order->address->zip_code }}</p>
                            <p class="cursor-pointer text-sm leading-4 dark:text-gray-400">Phone:
                                {{ $order->address->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-10 flex flex-wrap items-center border-b border-gray-200 pb-4 dark:border-gray-700">
                <div class="mb-4 w-full px-4 md:w-1/4">
                    <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400">Order Number:</p>
                    <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">{{ $order->id }}
                    </p>
                </div>
                <div class="mb-4 w-full px-4 md:w-1/4">
                    <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400">Date:</p>
                    <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">
                        {{ $order->created_at->format('d-m-Y') }}</p>
                </div>
                <div class="mb-4 w-full px-4 md:w-1/4">
                    <p class="mb-2 text-sm font-medium leading-5 text-gray-800 dark:text-gray-400">Total:</p>
                    <p class="text-base font-semibold leading-4 text-blue-600 dark:text-gray-400">
                        {{ Number::currency($order->grand_total, 'IDR') }}</p>
                </div>
                <div class="mb-4 w-full px-4 md:w-1/4">
                    <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400">Payment Method:</p>
                    <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">
                        {{ ucfirst($order->payment_method) }}</p>
                </div>
            </div>
            <div class="mb-10 px-4">
                <div
                    class="flex w-full flex-col items-stretch justify-center space-y-4 md:flex-row md:space-x-8 md:space-y-0">
                    <div class="flex w-full flex-col space-y-6">
                        <h2 class="mb-2 text-xl font-semibold text-gray-700 dark:text-gray-400">Order details</h2>
                        <div
                            class="flex w-full flex-col items-center justify-center space-y-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                            @foreach ($order->items as $item)
                                <div class="flex w-full justify-between">
                                    <p class="text-base leading-4 text-gray-800 dark:text-gray-400">
                                        {{ $item->name }}</p>
                                    <p class="text-base leading-4 text-gray-600 dark:text-gray-400">
                                        {{ Number::currency($item->unit_amount * $item->quantity, 'IDR') }}</p>
                                </div>
                            @endforeach
                            <div class="flex w-full justify-between">
                                <p class="text-base leading-4 text-gray-800 dark:text-gray-400">Subtotal</p>
                                <p class="text-base leading-4 text-gray-600 dark:text-gray-400">
                                    {{ Number::currency($order->grand_total, 'IDR') }}</p>
                            </div>
                            <div class="flex w-full items-center justify-between">
                                <p class="text-base leading-4 text-gray-800 dark:text-gray-400">Discount
                                </p>
                                <p class="text-base leading-4 text-gray-600 dark:text-gray-400">00</p>
                            </div>
                            <div class="flex w-full items-center justify-between">
                                <p class="text-base leading-4 text-gray-800 dark:text-gray-400">Shipping</p>
                                <p class="text-base leading-4 text-gray-600 dark:text-gray-400">00</p>
                            </div>
                        </div>
                        <div class="flex w-full items-center justify-between">
                            <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">Total</p>
                            <p class="text-base font-semibold leading-4 text-gray-600 dark:text-gray-400">
                                {{ Number::currency($order->grand_total, 'IDR') }}</p>
                        </div>
                    </div>
                    <div class="flex w-full flex-col space-y-4 px-2 md:px-8">
                        <h2 class="mb-2 text-xl font-semibold text-gray-700 dark:text-gray-400">Shipping</h2>
                        <div class="flex w-full items-start justify-between">
                            <div class="flex items-center justify-center space-x-2">
                                <div class="h-8 w-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-truck h-6 w-6 text-blue-600 dark:text-blue-400"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col items-center justify-start">
                                    <p class="text-lg font-semibold leading-6 text-gray-800 dark:text-gray-400">
                                        Delivery<br><span class="text-sm font-normal">Delivery within 24
                                            Hours</span>
                                    </p>
                                </div>
                            </div>
                            <p class="text-lg font-semibold leading-6 text-gray-800 dark:text-gray-400">00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-start gap-4 px-4">
                <a href="/products"
                    class="w-full rounded-md border border-blue-500 px-4 py-2 text-center text-blue-500 hover:bg-blue-600 hover:text-white dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700 md:w-auto">
                    Go back shopping
                </a>
                <a href="/orders"
                    class="w-full rounded-md bg-blue-500 px-4 py-2 text-center text-gray-50 hover:bg-blue-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 md:w-auto">
                    View My Orders
                </a>
            </div>
        </div>
    </div>
</section>
</div>
