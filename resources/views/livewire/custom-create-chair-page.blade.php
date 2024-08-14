<div>
    <section class="mt-8">
        <!-- Stepper -->
        <ul class="relative flex flex-row gap-x-2 max-w-xl mx-auto">
            <!-- Item -->
            <li class="shrink basis-0 flex-1 group">
                <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                    <span class="size-7 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full dark:bg-gray-700 dark:text-white">
                        1
                    </span>
                    <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden dark:bg-gray-700"></div>
                </div>
                <div class="mt-3">
                    <span class="block text-sm font-medium text-gray-800 dark:text-white">
                        Pilih Kategori
                    </span>
                </div>
            </li>
            <!-- End Item -->

            <!-- Item -->
            <li class="shrink basis-0 flex-1 group">
                <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                    <span class="size-7 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full dark:bg-gray-700 dark:text-white">
                        2
                    </span>
                    <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden dark:bg-gray-700"></div>
                </div>
                <div class="mt-3">
                    <span class="block text-sm font-medium text-gray-800 dark:text-white">
                        Pilih Tipe Produk
                    </span>
                </div>
            </li>
            <!-- End Item -->

            <!-- Item -->
            <li class="shrink basis-0 flex-1 group">
                <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                    <span class="size-7 flex justify-center items-center flex-shrink-0 bg-blue-600 font-medium text-white rounded-full dark:bg-gray-700 dark:text-white">
                        3
                    </span>
                    <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden dark:bg-gray-700"></div>
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

        <div class="m-6">
            <h3 class="text-2xl">Part 1</h3>
            <!-- Card layout for choosing Papan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($x3d_chair->model1_filepath as $item_model1_key => $item_model1)
                    <div class="card bg-white border rounded-lg shadow-md p-4 hover:shadow-lg cursor-pointer transition-transform transform-gpu hover:scale-105"
                        onclick="selectPart('{{ $item_model1 }}', 'model1', {{ $x3d_chair->price1[$item_model1_key]['price1'] ?? 'null' }})" id="card_model1_{{ $item_model1_key }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px">
                                <scene>
                                    <inline url="/storage/{{ $item_model1 }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @foreach ($x3d_chair->model1_originalname as $item_model1_name_key => $item_model1_name)
                                    @php
                                        $filename = pathinfo($item_model1_name, PATHINFO_FILENAME);
                                    @endphp
                                    @if ($item_model1_key === $loop->index)
                                        {{ $filename }}
                                    @endif
                                @endforeach
                                <div>
                                    <div class="mt-4">
                                        <h2 class="text-xl font-semibold">Harga:</h2>
                                        <p>
                                            @if(is_array($x3d_chair->price1) && isset($x3d_chair->price1[$item_model1_key]))
                                                Rp{{ number_format($x3d_chair->price1[$item_model1_key]['price1'], 0, ',', '.') }}
                                            @else
                                                Harga tidak tersedia
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="radio" name="item_model1" value="{{ $item_model1 }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <h3 class="text-2xl mt-6">Part 2</h3>
            <!-- Card layout for choosing model2 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($x3d_chair->model2_filepath as $item_model2_key => $item_model2)
                    <div class="card bg-white border rounded-lg shadow-md p-4 hover:shadow-lg cursor-pointer transition-transform transform-gpu hover:scale-105"
                        onclick="selectPart('{{ $item_model2 }}', 'model2', {{ $x3d_chair->price2[$item_model2_key]['price2'] ?? 'null' }})" id="card_model2_{{ $item_model2_key }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px">
                                <scene>
                                    <inline url="/storage/{{ $item_model2 }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @foreach ($x3d_chair->model2_originalname as $item_model2_name_key => $item_model2_name)
                                    @php
                                        $filename = pathinfo($item_model2_name, PATHINFO_FILENAME);
                                    @endphp
                                    @if ($item_model2_key === $loop->index)
                                        {{ $filename }}
                                    @endif
                                @endforeach
                                <div>
                                    <div class="mt-4">
                                        <h2 class="text-xl font-semibold">Harga:</h2>
                                        <p>
                                            @if(is_array($x3d_chair->price2) && isset($x3d_chair->price2[$item_model2_key]))
                                                Rp{{ number_format($x3d_chair->price2[$item_model2_key]['price2'], 0, ',', '.') }}
                                            @else
                                                Harga tidak tersedia
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="radio" name="item_model2" value="{{ $item_model2 }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <h3 class="text-2xl mt-6">Part 3</h3>
            <!-- Card layout for choosing model3 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($x3d_chair->model3_filepath as $item_model3_key => $item_model3)
                    <div class="card bg-white border rounded-lg shadow-md p-4 hover:shadow-lg cursor-pointer transition-transform transform-gpu hover:scale-105"
                        onclick="selectPart('{{ $item_model3 }}', 'model3', {{ $x3d_chair->price3[$item_model3_key]['price3'] ?? 'null' }})" id="card_model3_{{ $item_model3_key }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px">
                                <scene>
                                    <inline url="/storage/{{ $item_model3 }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @foreach ($x3d_chair->model3_originalname as $item_model3_name_key => $item_model3_name)
                                    @php
                                        $filename = pathinfo($item_model3_name, PATHINFO_FILENAME);
                                    @endphp
                                    @if ($item_model3_key === $loop->index)
                                        {{ $filename }}
                                    @endif
                                @endforeach
                                <div>
                                    <div class="mt-4">
                                        <h2 class="text-xl font-semibold">Harga:</h2>
                                        <p>
                                            @if(is_array($x3d_chair->price3) && isset($x3d_chair->price3[$item_model3_key]))
                                                Rp{{ number_format($x3d_chair->price3[$item_model3_key]['price3'], 0, ',', '.') }}
                                            @else
                                                Harga tidak tersedia
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="radio" name="item_model3" value="{{ $item_model3 }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <div class="my-6 min-h-60 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                    <h1 class="text-4xl text-blue-400">Hasil Kustomisasi</h1>
                    <span>Catatan: Tekan tombol a di keyboard jika hasil tidak muncul di box scene</span>
                    <div id="userModel_0" class="w-2/4" style="display: none;">
                        <x3d width="100%" height="70%">
                            <scene id="x3dContent_0"></scene>
                        </x3d>
                    </div>
                    <div id="totalHarga" class="mt-4 text-2xl font-semibold"></div>
                </div>
            </div>

            <div class="flex items-center gap-4 mt-4">
                <button onclick="applyChanges()" type="button" class="inline-flex items-center justify-center gap-2 rounded-md border border-transparent bg-blue-600 py-2 px-3 text-sm font-semibold text-white transition-all hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Apply
                </button>

                <!-- Tambahkan ke Keranjang Button -->
                <button onclick="addToCart()" type="button" class="inline-flex items-center justify-center gap-2 rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-semibold text-white transition-all hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2 5m5-5v6m4-6v6M1 1h4l2 7h12m0 0l1 2m-1-2H7" />
                    </svg>
                    Add To Cart
                </button>
            </div>

        </div>

        <!-- Error Warning Modal -->
        <div id="warningModal" class="fixed inset-0 flex justify-center items-center bg-gray-900 bg-opacity-75" style="display: none;">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-lg font-bold">Warning</h2>
                <p>You must choose your product 3D model part.</p>
                <button onclick="closeWarningModal()" class="mt-4 bg-blue-600 text-white py-2 px-4 rounded">OK</button>
            </div>
        </div>

        <script>
            var selectedModel1 = null;
            var selectedModel1Price = 0;
            var selectedModel2 = null;
            var selectedModel2Price = 0;
            var selectedModel3 = null;
            var selectedModel3Price = 0;

            function selectPart(value, type, price) {
                // Set pilihan model sesuai dengan bagian
                if (type === 'model1') {
                    selectedModel1 = value;
                    selectedModel1Price = price || 0;
                } else if (type === 'model2') {
                    selectedModel2 = value;
                    selectedModel2Price = price || 0;
                } else if (type === 'model3') {
                    selectedModel3 = value;
                    selectedModel3Price = price || 0;
                }

                // Update visualisasi pilihan
                var allCards = document.querySelectorAll(`.card[onclick*="${type}"]`);
                allCards.forEach(card => {
                    card.classList.remove('bg-blue-50', 'border-blue-600');
                });

                var selectedCard = document.querySelector(`.card[onclick="selectPart('${value}', '${type}', ${price})"]`);
                if (selectedCard) {
                    selectedCard.classList.add('bg-blue-50', 'border-blue-600');
                }

                // Aktifkan tombol "Add To Cart" jika semua bagian dipilih
                if (selectedModel1 && selectedModel2 && selectedModel3) {
                    document.getElementById('addToCartBtn').disabled = false;
                }
            }

            function addToCart() {
                if (!selectedModel1 || !selectedModel2 || !selectedModel3) {
                    document.getElementById('warningModal').style.display = 'flex';
                    return;
                }
            }

            function applyChanges() {
                // Pastikan semua bagian dipilih
                if (!selectedModel1 || !selectedModel2 || !selectedModel3) {
                    document.getElementById('warningModal').style.display = 'flex';
                    return;
                }

                // Masukkan model ke dalam X3D scene
                var x3dContent = document.getElementById('x3dContent_0');
                while (x3dContent.firstChild) {
                    x3dContent.removeChild(x3dContent.firstChild);
                }

                [selectedModel1, selectedModel2, selectedModel3].forEach(function(model) {
                    var inlineTag = document.createElement('inline');
                    inlineTag.setAttribute('url', `/storage/${model}`);
                    x3dContent.appendChild(inlineTag);
                });

                document.getElementById('userModel_0').style.display = 'block';

                // Hitung total harga dan tampilkan
                var totalHarga = selectedModel1Price + selectedModel2Price + selectedModel3Price;
                document.getElementById('totalHarga').innerText = 'Total Harga: Rp' + new Intl.NumberFormat('id-ID').format(totalHarga);
            }
        </script>
    </section>
</div>
