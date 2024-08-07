<div
    class="mx-auto w-full flex-grow border-y border-gray-200 bg-white px-4 py-10 dark:border-gray-700 dark:bg-slate-800 sm:px-6 lg:px-8">
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
                        class="flex size-7 flex-shrink-0 items-center justify-center rounded-full bg-gray-100 font-medium text-gray-800 dark:bg-gray-700 dark:text-white">
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
                        class="flex size-7 flex-shrink-0 items-center justify-center rounded-full bg-blue-600 font-medium text-white dark:text-white">
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

        <div class="m-6 dark:text-gray-200">
            <h3 class="text-2xl">Custom Part 1</h3>
            <!-- Card layout for choosing add1 -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($x3d_cabinet->parts->where('part_type', 'add1') as $part)
                    <div class="card transform-gpu cursor-pointer rounded-lg border bg-white p-4 shadow-md transition-transform hover:scale-105 hover:shadow-lg dark:bg-slate-900"
                        onclick="selectPart('{{ $part->file_path }}', 'add1', {{ $part->price }})"
                        id="card_add1_{{ $part->id }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px">
                                <scene>
                                    <inline url="/storage/{{ $part->file_path }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @php
                                    $filename = pathinfo($part->original_name, PATHINFO_FILENAME);
                                @endphp
                                {{ $filename }}
                            </div>
                            <div class="mt-1 text-sm text-gray-500">{{ Number::currency($part->price, 'IDR') }}</div>
                        </div>
                        <input type="radio" name="item_add1" value="{{ $part->file_path }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <h3 class="text-2xl">Custom Part 2</h3>
            <!-- Card layout for choosing add2 -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($x3d_cabinet->parts->where('part_type', 'add2') as $part)
                    <div class="card transform-gpu cursor-pointer rounded-lg border bg-white p-4 shadow-md transition-transform hover:scale-105 hover:shadow-lg dark:bg-slate-900"
                        onclick="selectPart('{{ $part->file_path }}', 'add2', {{ $part->price }})"
                        id="card_add2_{{ $part->id }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px">
                                <scene>
                                    <inline url="/storage/{{ $part->file_path }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @php
                                    $filename = pathinfo($part->original_name, PATHINFO_FILENAME);
                                @endphp
                                {{ $filename }}
                            </div>
                            <div class="mt-1 text-sm text-gray-500">{{ Number::currency($part->price, 'IDR') }}</div>
                        </div>
                        <input type="radio" name="item_add2" value="{{ $part->file_path }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <h3 class="text-2xl">Custom Part 3</h3>
            <!-- Card layout for choosing add3 -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($x3d_cabinet->parts->where('part_type', 'add3') as $part)
                    <div class="card transform-gpu cursor-pointer rounded-lg border bg-white p-4 shadow-md transition-transform hover:scale-105 hover:shadow-lg dark:bg-slate-900"
                        onclick="selectPart('{{ $part->file_path }}', 'add3', {{ $part->price }})"
                        id="card_add3_{{ $part->id }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px">
                                <scene>
                                    <inline url="/storage/{{ $part->file_path }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @php
                                    $filename = pathinfo($part->original_name, PATHINFO_FILENAME);
                                @endphp
                                {{ $filename }}
                            </div>
                            <div class="mt-1 text-sm text-gray-500">{{ Number::currency($part->price, 'IDR') }}</div>
                        </div>
                        <input type="radio" name="item_add3" value="{{ $part->file_path }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <h3 class="text-2xl">Custom Part 4</h3>
            <!-- Card layout for choosing add4 -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($x3d_cabinet->parts->where('part_type', 'add4') as $part)
                    <div class="card transform-gpu cursor-pointer rounded-lg border bg-white p-4 shadow-md transition-transform hover:scale-105 hover:shadow-lg dark:bg-slate-900"
                        onclick="selectPart('{{ $part->file_path }}', 'add4', {{ $part->price }})"
                        id="card_add4_{{ $part->id }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px">
                                <scene>
                                    <inline url="/storage/{{ $part->file_path }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @php
                                    $filename = pathinfo($part->original_name, PATHINFO_FILENAME);
                                @endphp
                                {{ $filename }}
                            </div>
                            <div class="mt-1 text-sm text-gray-500">{{ Number::currency($part->price, 'IDR') }}</div>
                        </div>
                        <input type="radio" name="item_add4" value="{{ $part->file_path }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <!-- Total Price Display -->
            <div class="mt-6 text-lg font-semibold text-gray-800 dark:text-gray-200">
                Total Harga: <span id="totalPrice">0.00</span>
            </div>

            <div
                class="my-6 flex min-h-60 flex-col rounded-xl border bg-white shadow-sm dark:border-gray-700 dark:bg-slate-900 dark:shadow-slate-700/[.7]">
                <div class="flex flex-auto flex-col items-center justify-center p-4 md:p-5">
                    <h1 class="text-4xl text-blue-400">Hasil Kustomisasi</h1>
                    <span>Catatan: Tekan tombol a di keyboard jika hasil tidak muncul di box scene</span>
                    <div id="userModel_0" class="w-full" style="display: none;">
                        <x3d width="100%" height="40%">
                            <scene id="x3dContent_0"></scene>
                        </x3d>
                    </div>
                </div>
            </div>

            <button onclick="applyChanges(0)" type="button"
                class="inline-flex items-center justify-center gap-2 rounded-md border border-transparent bg-blue-600 px-3 py-2 text-sm font-semibold text-white transition-all hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                Apply
            </button>
        </div>

        <!-- Error Warning Modal -->
        <div id="warningModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75"
            style="display: none;">
            <div class="rounded-lg bg-white p-6 text-center shadow-lg">
                <h2 class="text-lg font-bold">Warning</h2>
                <p>You must choose your product 3D model part.</p>
                <button onclick="closeWarningModal()"
                    class="mt-4 rounded bg-blue-600 px-4 py-2 text-white">OK</button>
            </div>
        </div>

        <script>
            // Variabel untuk menyimpan harga bagian yang dipilih
            var selectedAdd1 = {
                value: null,
                price: 0
            };
            var selectedAdd2 = {
                value: null,
                price: 0
            };
            var selectedAdd3 = {
                value: null,
                price: 0
            };
            var selectedAdd4 = {
                value: null,
                price: 0
            };

            // Fungsi untuk memilih bagian
            function selectPart(value, type, price) {
                if (type === 'add1') {
                    selectedAdd1.value = value;
                    selectedAdd1.price = price;
                } else if (type === 'add2') {
                    selectedAdd2.value = value;
                    selectedAdd2.price = price;
                } else if (type === 'add3') {
                    selectedAdd3.value = value;
                    selectedAdd3.price = price;
                } else if (type === 'add4') {
                    selectedAdd4.value = value;
                    selectedAdd4.price = price;
                }

                // Menghapus highlight dari semua card
                var allCards = document.querySelectorAll(`.card[onclick*="${type}"]`);
                allCards.forEach(card => {
                    card.classList.remove('bg-blue-50', 'border-blue-600', 'dark:bg-blue-800', 'dark:border-blue-400');
                });

                // Menyoroti card yang dipilih
                var selectedCard = document.querySelector(`.card[onclick="selectPart('${value}', '${type}')"]`);
                if (selectedCard) {
                    selectedCard.classList.add('bg-blue-50', 'border-blue-600', 'dark:bg-blue-800', 'dark:border-blue-400');
                }

                // Menghitung total harga
                calculateTotalPrice();
            }

            // Fungsi untuk menghitung total harga
            function calculateTotalPrice() {
                var totalPrice = selectedAdd1.price + selectedAdd2.price + selectedAdd3.price + selectedAdd4.price;
                // Format the total price using custom formatting
                var formatter = new Intl.NumberFormat('en-EN', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });

                // Get the formatted number
                var formattedPrice = formatter.format(totalPrice);

                // Replace the default separators to match 'IDR xxx,xxx.xx'
                formattedPrice = formattedPrice.replace(/\./g, '.').replace(/,/g, ',');

                // Prepend 'IDR ' to the formatted number
                formattedPrice = 'IDR ' + formattedPrice;

                // Set the formatted price to the span element
                document.getElementById('totalPrice').innerText = formattedPrice;
            }

            // Fungsi untuk menerapkan perubahan
            function applyChanges() {
                if (!selectedAdd1.value || !selectedAdd2.value || !selectedAdd3.value || !selectedAdd4.value) {
                    // Jika ada bagian yang belum dipilih
                    document.getElementById('warningModal').style.display = 'flex';
                    return;
                }

                var x3dContent = document.getElementById('x3dContent_0');
                x3dContent.innerHTML = ''; // Membersihkan konten sebelumnya

                // Menambahkan bagian yang dipilih ke dalam X3D content
                if (selectedAdd1.value) {
                    x3dContent.innerHTML += `<inline url="/storage/${selectedAdd1.value}" />`;
                }
                if (selectedAdd2.value) {
                    x3dContent.innerHTML += `<inline url="/storage/${selectedAdd2.value}" />`;
                }
                if (selectedAdd3.value) {
                    x3dContent.innerHTML += `<inline url="/storage/${selectedAdd3.value}" />`;
                }
                if (selectedAdd4.value) {
                    x3dContent.innerHTML += `<inline url="/storage/${selectedAdd4.value}" />`;
                }

                document.getElementById('userModel_0').style.display = 'block';
            }

            // Fungsi untuk menutup modal peringatan
            function closeWarningModal() {
                document.getElementById('warningModal').style.display = 'none';
            }
        </script>
    </section>
</div>
