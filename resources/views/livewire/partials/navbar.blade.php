<header
    class="sticky top-0 z-50 flex w-full flex-wrap bg-white py-3 text-sm shadow-md dark:bg-gray-800 md:flex-nowrap md:justify-start md:py-0">
    <nav class="mx-auto w-full max-w-[85rem] px-4 md:px-6 lg:px-8" aria-label="Global">
        <div class="relative md:flex md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-semibold dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    href="/" aria-label="Brand">UD Laris</a>
                <div class="flex items-center space-x-2 md:hidden">

                    {{-- Mobile Dark Mode --}}
                    <x-theme-toggle />
                    {{-- End Dark Mode --}}

                    <button type="button"
                        class="hs-collapse-toggle flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 text-sm font-semibold text-gray-800 hover:bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-collapse="#navbar-collapse-with-animation"
                        aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="h-4 w-4 flex-shrink-0 hs-collapse-open:hidden" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="hidden h-4 w-4 flex-shrink-0 hs-collapse-open:block"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div id="navbar-collapse-with-animation"
                class="hs-collapse hidden grow basis-full overflow-hidden transition-all duration-300 md:block">
                <div
                    class="max-h-[75vh] overflow-hidden overflow-y-auto [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500 [&::-webkit-scrollbar-track]:bg-gray-100 dark:[&::-webkit-scrollbar-track]:bg-slate-700 [&::-webkit-scrollbar]:w-2">
                    <div
                        class="mt-5 flex flex-col gap-x-0 divide-y divide-dashed divide-gray-200 dark:divide-gray-700 md:mt-0 md:flex-row md:items-center md:justify-end md:gap-x-7 md:divide-y-0 md:divide-solid md:ps-7">

                        <a wire:navigate
                            class="font-medium {{ request()->is('/') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-400 py-3 md:py-6 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="/" aria-current="page">Home</a>

                        <a wire:navigate
                            class="font-medium {{ request()->is('categories') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-400 py-3 md:py-6 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="/categories">
                            Categories
                        </a>

                        <a wire:navigate
                            class="font-medium {{ request()->is('product-custom') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-400 py-3 md:py-6 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="/product-custom">
                            Custom Products
                        </a>

                        <a wire:navigate
                            class="font-medium {{ request()->is('products') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-400 py-3 md:py-6 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="/products">
                            Products
                        </a>

                        <a wire:navigate
                            class="font-medium flex items-center {{ request()->is('cart') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-400 py-3 md:py-6 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="/cart">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="mr-1 h-5 w-5 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <span class="mr-1">Cart</span> <span
                                class="rounded-full border border-blue-200 bg-blue-50 px-1.5 py-0.5 text-xs font-medium text-blue-600">{{ $total_count }}</span>
                        </a>

                        {{-- Dark Mode --}}
                        <div class="hidden md:flex md:items-center">
                            <x-theme-toggle />
                        </div>
                        {{-- End Dark Mode --}}

                        @guest
                            <div class="pt-3 md:pt-0">
                                <a class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 disabled:pointer-events-none disabled:opacity-50 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                    href="/register">
                                    <svg class="h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    Sign up
                                </a>
                            </div>
                        @endguest

                        @auth
                            <div
                                class="hs-dropdown [--adaptive:none] [--strategy:static] md:py-4 md:[--strategy:fixed] md:[--trigger:hover]">
                                <button type="button"
                                    class="flex w-full items-center font-medium text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500">
                                    {{ Auth::user()->name }}
                                    <svg class="ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    class="hs-dropdown-menu top-full z-10 hidden rounded-lg bg-white p-2 opacity-0 transition-[opacity,margin] duration-[0.1ms] before:absolute before:-top-5 before:start-0 before:h-5 before:w-full hs-dropdown-open:opacity-100 dark:divide-gray-700 dark:border-gray-700 dark:bg-gray-800 md:w-48 md:border md:shadow-md md:duration-[150ms] md:dark:border">
                                    <a class="flex items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                        href="#">
                                        My Orders
                                    </a>

                                    <a class="flex items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                        href="#">
                                        My Account
                                    </a>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <a class="flex items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                            href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </div>
                            </div>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
