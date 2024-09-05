<div class="border-b border-gray-200 bg-white p-6 lg:p-8">
    {{-- <x-application-logo class="block h-12 w-auto" /> --}}

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome to your Dashboard! {{auth()->user()->name}}
    </h1>

    <p class="mt-6 leading-relaxed text-gray-500">
        You are logged in!
    </p>
</div>

<div class="grid grid-cols-1 gap-6 bg-gray-200 bg-opacity-25 p-6 md:grid-cols-2 lg:gap-8 lg:p-8">
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 1024 1024">
                <path fill="#9ca3af" fill-rule="evenodd" d="M464 144c8.837 0 16 7.163 16 16v304c0 8.836-7.163 16-16 16H160c-8.837 0-16-7.164-16-16V160c0-8.837 7.163-16 16-16zm-52 68H212v200h200zm493.333 87.686c6.248 6.248 6.248 16.379 0 22.627l-181.02 181.02c-6.248 6.248-16.378 6.248-22.627 0l-181.019-181.02c-6.248-6.248-6.248-16.379 0-22.627l181.02-181.02c6.248-6.248 16.378-6.248 22.627 0zm-84.853 11.313L713 203.52L605.52 311L713 418.48zM464 544c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H160c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H212v200h200zm452-68c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H560c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H612v200h200z" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                <a href="/products">Products</a>
            </h2>
        </div>

        <p class="mt-4 text-sm leading-relaxed text-gray-500">
            UD Laris memiliki beragam produk furniture seperti lemari, kursi, meja, dan rak. Jika Anda tertarik dengan produk yang kami tawarkan silahkan lanjutkan ke halaman produk.
        </p>

        <p class="mt-4 text-sm">
            <a href="/products" class="inline-flex items-center font-semibold text-indigo-700">
                Explore our products

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 h-5 w-5 fill-indigo-500">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 20 20">
                <path fill="#9ca3af" d="M18.33 3.57s.27-.8-.31-1.36c-.53-.52-1.22-.24-1.22-.24c-.61.3-5.76 3.47-7.67 5.57c-.86.96-2.06 3.79-1.09 4.82c.92.98 3.96-.17 4.79-1c2.06-2.06 5.21-7.17 5.5-7.79M1.4 17.65c2.37-1.56 1.46-3.41 3.23-4.64c.93-.65 2.22-.62 3.08.29c.63.67.8 2.57-.16 3.46c-1.57 1.45-4 1.55-6.15.89" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                <a href="/product-custom">Kustomisasi Produk</a>
            </h2>
        </div>

        <p class="mt-4 text-sm leading-relaxed text-gray-500">
            UD Laris juga memiliki beberapa produk yang dapat Anda sesuaikan dengan kebutuhan Anda.
        </p>

        <p class="mt-4 text-sm">
            <a href="/product-custom" class="inline-flex items-center font-semibold text-indigo-700">
                Start customizing your needs

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 h-5 w-5 fill-indigo-500">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>
</div>
