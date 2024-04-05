<div>
    <section class="overflow-hidden">
        <!-- Background image -->
        <div
            class="relative overflow-hidden bg-cover bg-no-repeat bg-[50%] h-[500px] bg-[url('https://img.archiexpo.com/images_ae/photo-g/11279-18521817.webp')]">
            <div
                class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed bg-[hsla(0,0%,0%,0.75)]">
                <div class="flex items-center justify-center h-full">
                    <div class="px-6 text-center text-white md:px-12">
                        <h1 class="mt-6 mb-16 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl">
                            Sesuaikan kebutuhanmu dengan <br /><span>kustomisasi</span>
                        </h1>
                        <a class="mb-2 inline-block rounded-full border-2 border-neutral-50 px-[46px] pt-[14px] pb-[12px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 md:mr-2 md:mb-0"
                            data-te-ripple-init data-te-ripple-color="light" href="/product-custom" wire:navigate
                            role="button">Mulai
                            kustomisasi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Slider -->
    <div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "isAutoPlay": true
  }' class="relative">
        <div class="hs-carousel relative overflow-hidden w-full min-h-[350px] bg-white">
            <div
                class="absolute top-0 bottom-0 flex transition-transform duration-700 opacity-0 hs-carousel-body start-0 flex-nowrap">
                <div class="hs-carousel-slide">
                    <div class="flex justify-center h-full p-6 bg-gray-100">
                        <span class="self-center text-4xl transition duration-700">First slide</span>
                    </div>
                </div>
                <div class="hs-carousel-slide">
                    <div class="flex justify-center h-full p-6 bg-gray-200">
                        <span class="self-center text-4xl transition duration-700">Second slide</span>
                    </div>
                </div>
                <div class="hs-carousel-slide">
                    <div class="flex justify-center h-full p-6 bg-gray-300">
                        <span class="self-center text-4xl transition duration-700">Third slide</span>
                    </div>
                </div>
            </div>
        </div>

        <button type="button"
            class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
            <span class="text-2xl" aria-hidden="true">
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                </svg>
            </span>
            <span class="sr-only">Previous</span>
        </button>
        <button type="button"
            class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
            <span class="sr-only">Next</span>
            <span class="text-2xl" aria-hidden="true">
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </span>
        </button>

        <div class="absolute flex justify-center space-x-2 hs-carousel-pagination bottom-3 start-0 end-0">
            <span
                class="border border-gray-400 rounded-full cursor-pointer hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3"></span>
            <span
                class="border border-gray-400 rounded-full cursor-pointer hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3"></span>
            <span
                class="border border-gray-400 rounded-full cursor-pointer hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3"></span>
        </div>
    </div>
    <!-- End Slider -->

    {{-- Featured Start --}}
    <section class="py-12 text-gray-700 bg-white sm:py-16 lg:py-20">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="max-w-md mx-auto text-center">
                <h2 class="text-2xl font-bold sm:text-3xl">Produk Termurah</h2>
                <p class="mt-4 text-base text-gray-700">Berbagai macam produk unggulan di UD Laris dengan harga
                    terjangkau</p>
            </div>

            <div class="grid grid-cols-2 gap-6 mt-10 lg:mt-16 lg:grid-cols-4 lg:gap-4">
                {{-- @foreach ($products as $product)
                    <article class="relative" wire:key="{{ $product->id }}">
                        <div class="overflow-hidden aspect-square">
                            <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-125"
                                src="{{ url('storage', $product->image[0]) }}" alt="" />
                        </div>
                        <div class="absolute top-0 m-1 bg-white rounded-full">
                            <p
                                class="text-[10px] rounded-full bg-black p-1 font-bold uppercase tracking-wide text-white sm:px-3 sm:py-1">
                                Promo</p>
                        </div>
                        <div class="flex items-start justify-between mt-4">
                            <div class="">
                                <h3 class="text-xs font-semibold sm:text-sm md:text-base">
                                    <a href="#" title="" class="cursor-pointer">
                                        {{ $product->name }}
                                        <span class="absolute" aria-hidden="true"></span>
                                    </a>
                                </h3>
                                <div class="flex items-center mt-2">
                                    <svg class="block w-3 h-3 text-black align-middle sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block w-3 h-3 text-black align-middle sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block w-3 h-3 text-black align-middle sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block w-3 h-3 text-black align-middle sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block w-3 h-3 text-gray-400 align-middle sm:h-4 sm:w-4"
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
                @endforeach --}}

                {{-- without discount if needed later uncomment this code --}}
                @foreach ($products as $product)
                    <article class="relative">
                        <div class="overflow-hidden aspect-square">
                            <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-125"
                                src="{{ url('storage', $product->image[0]) }}" alt="" />
                        </div>
                        <div class="flex items-start justify-between mt-4">
                            <div class="">
                                <h3 class="text-xs font-semibold sm:text-sm md:text-base">
                                    <a href="#" title="" class="cursor-pointer">
                                        {{ $product->name }}
                                        <span class="absolute" aria-hidden="true"></span>
                                    </a>
                                </h3>
                                <div class="flex items-center mt-2">
                                    <svg class="block w-3 h-3 text-black align-middle sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block w-3 h-3 text-black align-middle sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block w-3 h-3 text-black align-middle sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block w-3 h-3 text-black align-middle sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                    <svg class="block w-3 h-3 text-black align-middle sm:h-4 sm:w-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            class=""></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="text-right">
                                <p class="text-xs font-normal sm:text-sm md:text-base">
                                    {{ Number::currency($product->price, 'IDR') }}
                                </p>
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>
    </section>
    {{-- Featured End --}}

    {{-- Category Start --}}
    <section>
        <div class="py-20 bg-orange-200">
            <div class="max-w-xl mx-auto">
                <div class="text-center ">
                    <div class="relative flex flex-col items-center">
                        <h1 class="text-5xl font-bold"> Browse <span class="text-blue-500">
                                Categories
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
                <div class="grid gap-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-6">

                    @foreach ($categories as $category)
                        <a class="flex flex-col transition bg-white border shadow-sm group rounded-xl hover:shadow-md"
                            href="{{ $category->slug }}" wire:key="{{ $category->id }}">
                            <div class="p-4 md:p-5">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img class="h-[2.375rem] w-[2.375rem] rounded-full"
                                            src="{{ url('storage', $category->thumbnail) }}"
                                            alt="{{ $category->name }}">
                                        <div class="ms-3">
                                            <h3 class="font-semibold text-gray-800 group-hover:text-blue-600">
                                                {{ $category->name }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="ps-3">
                                        <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg"
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
    {{-- Category End --}}

    {{-- Contact Start --}}
    <section class="bg-white">
        <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:py-20 lg:px-8">
            <div class="max-w-2xl mx-auto text-center lg:max-w-4xl">
                <h2 class="text-3xl font-extrabold text-gray-900">Kunjungi Toko Kami</h2>
                <p class="mt-4 text-lg text-gray-500">Pemesanan secara langsung melalui deskripsi lokasi berikut.</p>
            </div>
            <div class="mt-16 lg:mt-20">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <div class="overflow-hidden rounded-lg">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9649401017837!2d110.39056077588643!3d-7.79353687735167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59d863f76fe1%3A0xe66f801a04458620!2sUD.%20Laris!5e0!3m2!1sid!2sid!4v1711765255859!5m2!1sid!2sid"
                            width="100%" height="480" style="border:0;" allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                    <div>
                        <div class="max-w-full mx-auto overflow-hidden rounded-lg">
                            <div class="px-6 py-4">
                                <h3 class="text-lg font-medium text-gray-900">Alamat Toko</h3>
                                <p class="mt-1 text-gray-600">Jl. Ipda Tut Harsono, Muja Muju, Kec. Umbulharjo, Kota
                                    Yogyakarta, Daerah Istimewa Yogyakarta 55165</p>
                            </div>
                            <div class="px-6 py-4 border-t border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">Jam Buka</h3>
                                <p class="mt-1 text-gray-600">Senin - Jumat: 09.00 - 17.00</p>
                                <p class="mt-1 text-gray-600">Sabtu: 10.00 - 16.00</p>
                                <p class="mt-1 text-gray-600">Minggu: Tutup</p>
                            </div>
                            <div class="px-6 py-4 border-t border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">Kontak</h3>
                                <p class="mt-1 text-gray-600">Email: udlarisjogja@hotmail.com</p>
                                <p class="mt-1 text-gray-600">Phone: +62 877 3878 0947</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Contact End --}}
</div>
