<div class="mx-auto w-full flex-grow border-y border-gray-200 bg-gray-100 px-4 py-10 dark:border-gray-700 dark:bg-slate-800 sm:px-6 lg:px-8">
    <section class="mx-auto w-full max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
            <div class="grid gap-4 sm:grid-cols-1 sm:gap-6 md:grid-cols-2 lg:grid-cols-2">

                @foreach ($categories as $category)
                    <a class="group flex flex-col rounded-xl border bg-white shadow-sm transition hover:shadow-md dark:border-gray-800 dark:bg-slate-900 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="/products?selected_categories[0]={{ $category->id }}">
                        <div class="p-4 md:p-5">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img class="h-[5rem] w-[5rem]" src="{{ url('storage', $category->thumbnail) }}"
                                        alt="{{ $category->name }}">
                                    <div class="ms-3">
                                        <h3
                                            class="text-2xl font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200 dark:group-hover:text-gray-400">
                                            {{ $category->name }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="ps-3">
                                    <svg class="h-5 w-5 flex-shrink-0 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>
</div>
