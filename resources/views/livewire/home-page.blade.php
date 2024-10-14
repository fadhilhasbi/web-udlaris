<div>
    <!-- Slider -->
    <section class="overflow-hidden">
        <div data-hs-carousel='{
            "loadingClasses": "opacity-0",
            "isAutoPlay": "true",
            "speed": "3000"
          }'
            class="relative">
            <div class="hs-carousel relative h-[500px] overflow-hidden">
                <div
                    class="hs-carousel-body absolute bottom-0 start-0 top-0 flex flex-nowrap opacity-0 transition-transform duration-700">
                    @foreach ($slides as $slide)
                        @php
                            $bgImage = url('storage', $slide->image);
                        @endphp
                        <div class="bg-cover bg-[50%] bg-no-repeat" style="background-image: url('{{ $bgImage }}')">
                            <div class="h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.75)] bg-fixed">
                                <div class="hs-carousel-slide flex h-full items-center justify-center">
                                    <div class="px-6 text-center text-white md:px-12">
                                        <h1
                                            class="mb-16 mt-6 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl">
                                            {{ $slide->title }}
                                        </h1>
                                        <a class="mb-2 inline-block rounded-full border-2 border-neutral-50 px-[46px] pb-[12px] pt-[14px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 md:mb-0 md:mr-2"
                                            data-te-ripple-init data-te-ripple-color="light" href="/product-custom"
                                            wire:navigate role="button">Mulai
                                            kustomisasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- <div>
                <button type="button" class="hs-carousel-prev">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button" class="hs-carousel-next">
                    <span class="sr-only">Next</span>
                    <span aria-hidden="true">»</span>
                </button>
            </div> --}}
        </div>
    </section>
    <!-- End Slider -->


    {{-- Featured Start --}}
    <section class="bg-white py-12 text-gray-700 dark:bg-gray-900 dark:text-gray-100 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-md text-center">
                <h2 class="text-2xl font-bold sm:text-3xl">Produk Termurah</h2>
                <p class="mt-4 text-base text-gray-700 dark:text-gray-200">Berbagai macam produk unggulan di UD Laris
                    dengan harga
                    terjangkau</p>
            </div>
            <div class="mt-10 grid grid-cols-2 gap-6 lg:mt-16 lg:grid-cols-4 lg:gap-4">
                @foreach ($products as $product)
                    <a href="/products/{{ $product->slug }}" class="group block">
                       <img src="{{ url('storage', $product->image[0]) }}" alt="{{ $product->name }}"
                            class="aspect-square w-full rounded object-cover" />

                        <div class="mt-3">
                            <h3 class="font-medium text-gray-900 group-hover:underline group-hover:underline-offset-4 dark:text-gray-100">
                                {{ $product->name }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ Number::currency($product->price, 'IDR') }}</p>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>
    {{-- Featured End --}}

    {{-- Category Start --}}
    <section>
        <div class="bg-orange-200 py-20 dark:bg-neutral-800">
            <div class="mx-auto max-w-xl">
                <div class="text-center">
                    <div class="relative flex flex-col items-center">
                        <h1 class="text-5xl font-bold dark:text-gray-200"> Browse <span class="text-blue-500">
                                Categories
                            </span> </h1>
                        <div class="mb-6 mt-2 flex w-40 overflow-hidden rounded">
                            <div class="h-2 flex-1 bg-blue-200">
                            </div>
                            <div class="h-2 flex-1 bg-blue-400">
                            </div>
                            <div class="h-2 flex-1 bg-blue-600">
                            </div>
                        </div>
                    </div>
                    <p class="mb-12 text-center text-base text-gray-500 dark:text-gray-300">
                        Sedang cari apa? Pilih produk yang kamu butuhkan sesuai kategori yang tersedia sebagai berikut.
                    </p>
                </div>
            </div>

            <div class="mx-auto max-w-[85rem] px-4 sm:px-6 lg:px-8">
                <div class="grid gap-3 sm:grid-cols-2 sm:gap-6 md:grid-cols-3 lg:grid-cols-4">

                    @foreach ($categories as $category)
                        <a class="group flex flex-col rounded-xl border bg-white shadow-sm transition hover:shadow-md dark:border-gray-700 dark:bg-gray-800"
                            href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}">
                            <div class="p-4 md:p-5">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img class="h-[2.375rem] w-[2.375rem] rounded-full"
                                            src="{{ url('storage', $category->thumbnail) }}"
                                            alt="{{ $category->name }}">
                                        <div class="ms-3">
                                            <h3
                                                class="font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200 dark:group-hover:text-gray-400">
                                                {{ $category->name }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="ps-3">
                                        <svg class="h-5 w-5 flex-shrink-0 dark:text-gray-200"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
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
    <section class="bg-white dark:border-b dark:border-gray-700 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="mx-auto max-w-2xl text-center lg:max-w-4xl">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-gray-200">Kunjungi Toko Kami</h2>
                <p class="mt-4 text-lg text-gray-500 dark:text-gray-300">Pemesanan secara langsung melalui deskripsi
                    lokasi berikut.</p>
            </div>
            <div class="mt-16 lg:mt-20">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <div class="overflow-hidden rounded-lg">
                        <iframe class="dark:hidden"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9649401017837!2d110.39056077588643!3d-7.79353687735167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59d863f76fe1%3A0xe66f801a04458620!2sUD.%20Laris!5e0!3m2!1sid!2sid!4v1711765255859!5m2!1sid!2sid"
                            width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <iframe class="hidden dark:block" style="filter: invert(90%) hue-rotate(180deg)"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9649401017837!2d110.39056077588643!3d-7.79353687735167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59d863f76fe1%3A0xe66f801a04458620!2sUD.%20Laris!5e0!3m2!1sid!2sid!4v1711765255859!5m2!1sid!2sid"
                            width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div>
                        <div class="mx-auto max-w-full overflow-hidden rounded-lg">
                            <div class="px-6 py-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Alamat Toko</h3>
                                <p class="mt-1 text-gray-600 dark:text-gray-200">Jl. Ipda Tut Harsono, Muja Muju, Kec.
                                    Umbulharjo, Kota
                                    Yogyakarta, Daerah Istimewa Yogyakarta 55165</p>
                            </div>
                            <div class="border-t border-gray-200 px-6 py-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Jam Buka</h3>
                                <p class="mt-1 text-gray-600 dark:text-gray-200">Senin - Jumat: 09.00 - 17.00</p>
                                <p class="mt-1 text-gray-600 dark:text-gray-200">Sabtu: 10.00 - 16.00</p>
                                <p class="mt-1 text-gray-600 dark:text-gray-200">Minggu: Tutup</p>
                            </div>
                            <div class="border-t border-gray-200 px-6 py-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Kontak</h3>
                                <p class="mt-1 text-gray-600 dark:text-gray-200">Email: udlarisjogja@hotmail.com</p>
                                <p class="mt-1 text-gray-600 dark:text-gray-200">Phone: +62 877 3878 0947</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Contact End --}}
</div>
