<div class="mx-auto w-full max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8">
    <section class="font-poppins flex items-center dark:bg-gray-800">
        <div class="mx-auto max-w-6xl flex-1 justify-center rounded-md border bg-white px-4 py-4 dark:border-gray-900 dark:bg-gray-900 md:px-10 md:py-10">
            <div>
                <h1 class="px-4 text-center text-3xl font-semibold tracking-wide text-red-500 dark:text-gray-300">
                    @if($transactionStatus == 'expire')
                        Payment Expired! Order Cancelled!
                    @else
                        Payment Failed! Order Cancelled!
                    @endif
                </h1>
                @if($order)
                    <p class="mt-4 text-center text-gray-600 dark:text-gray-400">
                        Order ID: {{ $order->id }}
                    </p>
                @endif
                @if($statusCode)
                    <p class="mt-2 text-center text-gray-600 dark:text-gray-400">
                        Status Code: {{ $statusCode }}
                    </p>
                @endif
                <p class="mt-2 text-center text-gray-600 dark:text-gray-400">
                    Transaction Status: {{ $transactionStatus }}
                </p>
            </div>
        </div>
    </section>
</div>
