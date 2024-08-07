<div class="mx-auto w-full flex-grow border-y border-gray-200 bg-white px-4 py-10 dark:border-gray-700 dark:bg-slate-800 sm:px-6 lg:px-8">
    <section class="mt-8">
        <!-- Stepper -->
        <ul class="relative mx-auto flex max-w-xl flex-row gap-x-2">
            <!-- Item -->
            <li class="group flex-1 shrink basis-0">
                <div class="inline-flex min-h-7 w-full min-w-7 items-center align-middle text-xs">
                    <span
                        class="flex size-7 flex-shrink-0 items-center justify-center rounded-full bg-gray-100 font-medium text-gray-800 dark:bg-gray-700 dark:text-white">
                        1
                    </span>
                    <div class="ms-2 h-px w-full flex-1 bg-gray-200 group-last:hidden dark:bg-gray-700"></div>
                </div>
                <div class="mt-3">
                    <span class="block text-sm font-medium text-gray-800 dark:text-white">
                        Pilih Kategori
                    </span>
                </div>
            </li>
            <!-- End Item -->

            <!-- Item -->
            <li class="group flex-1 shrink basis-0">
                <div class="inline-flex min-h-7 w-full min-w-7 items-center align-middle text-xs">
                    <span
                        class="flex size-7 flex-shrink-0 items-center justify-center rounded-full bg-blue-600 font-medium text-white dark:text-white">
                        2
                    </span>
                    <div class="ms-2 h-px w-full flex-1 bg-gray-200 group-last:hidden dark:bg-gray-700"></div>
                </div>
                <div class="mt-3">
                    <span class="block text-sm font-medium text-gray-800 dark:text-white">
                        Pilih Tipe Produk
                    </span>
                </div>
            </li>
            <!-- End Item -->

            <!-- Item -->
            <li class="group flex-1 shrink basis-0">
                <div class="inline-flex min-h-7 w-full min-w-7 items-center align-middle text-xs">
                    <span
                        class="flex size-7 flex-shrink-0 items-center justify-center rounded-full bg-gray-100 font-medium text-gray-800 dark:bg-gray-700 dark:text-white">
                        3
                    </span>
                    <div class="ms-2 h-px w-full flex-1 bg-gray-200 group-last:hidden dark:bg-gray-700"></div>
                </div>
                <div class="mt-3">
                    <span class="block text-sm font-medium text-gray-800 dark:text-white">
                        Kustomisasi Produk
                    </span>
                </div>
            </li>
            <!-- End Item -->
        </ul>
        <!-- End Stepper -->

        <div class="mx-auto w-full max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
                <div class="grid gap-4 sm:grid-cols-1 sm:gap-6 md:grid-cols-2 lg:grid-cols-2">

                    @foreach ($x3d_cabinets as $x3d_cabinet)
                        <a class="group flex flex-col rounded-xl border bg-white shadow-sm transition hover:shadow-md dark:border-gray-800 dark:bg-slate-900 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="/product-custom/lemari/{{ $x3d_cabinet->slug }}">
                            <div class="p-4 md:p-5">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img class="h-[5rem] w-[5rem] dark:text-gray-200" src="{{ url('storage', $x3d_cabinet->thumbnail) }}"
                                            alt="{{ $x3d_cabinet->name }}">
                                        <div class="ms-3">
                                            <h3
                                                class="text-2xl font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200 dark:group-hover:text-gray-400">
                                                {{ $x3d_cabinet->name }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="ps-3">
                                        <svg class="h-5 w-5 flex-shrink-0 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m9 18 6-6-6-6" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</div>
