<div>
    <section class="mb-40 overflow-hidden">
        <!-- Background image -->
        <div
            class="relative overflow-hidden bg-cover bg-no-repeat bg-[50%] h-[500px] bg-[url('https://tecdn.b-cdn.net/img/new/standard/city/078.jpg')]">
            <div
                class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed bg-[hsla(0,0%,0%,0.75)]">
                <div class="flex h-full items-center justify-center">
                    <div class="px-6 text-center text-white md:px-12">
                        <h1 class="mt-6 mb-16 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl">
                            Cocokan kebutuhanmu dengan <br /><span>kustomisasi</span>
                        </h1>
                        <a class="mb-2 inline-block rounded-full border-2 border-neutral-50 px-[46px] pt-[14px] pb-[12px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 md:mr-2 md:mb-0"
                            data-te-ripple-init data-te-ripple-color="light" href="#" role="button">Mulai
                            kustomisasi</a>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="-mt-2.5 text-white dark:text-neutral-800 md:-mt-4 lg:-mt-6 xl:-mt-10 h-[50px] scale-[2] origin-[top_center]">
            <svg viewBox="0 0 2880 48" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M 0 48 L 1437.5 48 L 2880 48 L 2880 0 L 2160 0 C 1453.324 60.118 726.013 4.51 720 0 L 0 0 L 0 48 Z"
                    fill="currentColor"></path>
            </svg>
        </div>
    </section>

    {{-- Featured Start --}}
    <section class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-md text-center">
                <h2 class="text-2xl font-bold sm:text-3xl">Produk unggulan UD Laris</h2>
                <p class="mt-4 text-base text-gray-700">Berbagai macam produk unggulan di UD Laris dengan harga
                    terjangkau</p>
            </div>

            <div class="mt-10 grid grid-cols-2 gap-6 lg:mt-16 lg:grid-cols-4 lg:gap-4">
                @foreach ($products as $product)
                    <article class="relative" wire:key="{{ $product->id }}">
                        <div class="aspect-square overflow-hidden">
                            <img class="group-hover:scale-125 h-full w-full object-cover transition-all duration-300"
                                src="{{ url('storage', $product->image[0]) }}" alt="" />
                        </div>
                        <div class="absolute top-0 m-1 rounded-full bg-white">
                            <p
                                class="text-[10px] rounded-full bg-black p-1 font-bold uppercase tracking-wide text-white sm:px-3 sm:py-1">
                                Promo</p>
                        </div>
                        <div class="mt-4 flex items-start justify-between">
                            <div class="">
                                <h3 class="text-xs font-semibold sm:text-sm md:text-base">
                                    <a href="#" title="" class="cursor-pointer">
                                        {{ $product->name }}
                                        <span class="absolute" aria-hidden="true"></span>
                                    </a>
                                </h3>
                                <div class="mt-2 flex items-center">
                                    <svg class="block h-3 w-3 align-middle text-black sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block h-3 w-3 align-middle text-black sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block h-3 w-3 align-middle text-black sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block h-3 w-3 align-middle text-black sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block h-3 w-3 align-middle text-gray-400 sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="text-right">
                                <del class="mt-px text-xs font-semibold text-gray-600 sm:text-sm"> Rp.
                                    {{ $product->price }} </del>
                                <p class="text-xs font-normal sm:text-sm md:text-base">$99.00</p>
                            </div>
                        </div>
                    </article>
                @endforeach

                {{-- without discount if needed later uncomment this code --}}
                {{-- <article class="relative">
                    <div class="aspect-square overflow-hidden">
                        <img class="group-hover:scale-125 h-full w-full object-cover transition-all duration-300"
                            src="/images/sUgmRNIkRW2SZCLKOOfX2.png" alt="" />
                    </div>
                    <div class="mt-4 flex items-start justify-between">
                        <div class="">
                            <h3 class="text-xs font-semibold sm:text-sm md:text-base">
                                <a href="#" title="" class="cursor-pointer">
                                    Albanian Essence
                                    <span class="absolute" aria-hidden="true"></span>
                                </a>
                            </h3>
                            <div class="mt-2 flex items-center">
                                <svg class="block h-3 w-3 align-middle text-black sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        class=""></path>
                                </svg>
                                <svg class="block h-3 w-3 align-middle text-black sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        class=""></path>
                                </svg>
                                <svg class="block h-3 w-3 align-middle text-black sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        class=""></path>
                                </svg>
                                <svg class="block h-3 w-3 align-middle text-black sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        class=""></path>
                                </svg>
                                <svg class="block h-3 w-3 align-middle text-black sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        class=""></path>
                                </svg>
                            </div>
                        </div>

                        <div class="text-right">
                            <p class="text-xs font-normal sm:text-sm md:text-base">$299.00</p>
                        </div>
                    </div>
                </article> --}}

            </div>
        </div>
    </section>
    {{-- Featured End --}}

    {{-- Category Start --}}
    <div class="bg-orange-200 py-20">
        <div class="max-w-xl mx-auto">
            <div class="text-center ">
                <div class="relative flex flex-col items-center">
                    <h1 class="text-5xl font-bold dark:text-gray-200"> Browse <span class="text-blue-500"> Categories
                        </span> </h1>
                    <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                        <div class="flex-1 h-2 bg-blue-200">
                        </div>
                        <div class="flex-1 h-2 bg-blue-400">
                        </div>
                        <div class="flex-1 h-2 bg-blue-600">
                        </div>
                    </div>
                </div>
                <p class="mb-12 text-base text-center text-gray-500">
                    Sedang cari apa? Pilih produk yang kamu butuhkan sesuai kategori yang tersedia sebagai berikut.
                </p>
            </div>
        </div>

        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">

                @foreach ($categories as $category)
                    <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="{{ $category->slug }}" wire:key="{{ $category->id }}">
                        <div class="p-4 md:p-5">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <img class="h-[2.375rem] w-[2.375rem] rounded-full"
                                        src="{{ url('storage', $category->thumbnail) }}" alt="{{ $category->name }}">
                                    <div class="ms-3">
                                        <h3
                                            class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            {{ $category->name }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="ps-3">
                                    <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24"
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
    </div>
    {{-- Category End --}}
</div>
