<div>
    <section class="mt-8">
        <!-- Stepper -->
        <ul class="relative flex flex-row gap-x-2 max-w-xl mx-auto">
            <!-- Item -->
            <li class="shrink basis-0 flex-1 group">
                <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                    <span
                        class="size-7 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full dark:bg-gray-700 dark:text-white">
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
                    <span
                        class="size-7 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full dark:bg-gray-700 dark:text-white">
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
                    <span
                        class="size-7 flex justify-center items-center flex-shrink-0 bg-blue-600 font-medium text-white rounded-full dark:bg-gray-700 dark:text-white">
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
            <h3 class="text-2xl">Custom Papan</h3>
            <!-- Card layout for choosing Papan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($x3d_chair->papan_filepath as $item_papan_key => $item_papan)
                    <div class="card bg-white border rounded-lg shadow-md p-4 hover:shadow-lg cursor-pointer transition-transform transform-gpu hover:scale-105"
                        onclick="selectPart('{{ $item_papan }}', 'papan')" id="card_papan_{{ $item_papan_key }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px"> <!-- Larger X3D Preview -->papan
                                <scene>
                                    <inline url="/storage/{{ $item_papan }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @foreach ($x3d_chair->papan_originalname as $item_papan_name_key => $item_papan_name)
                                    @php
                                        $filename = pathinfo($item_papan_name, PATHINFO_FILENAME);
                                    @endphp
                                    @if ($item_papan_key === $loop->index)
                                        {{ $filename }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <input type="radio" name="item_papan" value="{{ $item_papan }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <h3 class="text-2xl mt-6">Custom Kaki</h3>
            <!-- Card layout for choosing laci -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($x3d_chair->kaki_filepath as $item_kaki_key => $item_kaki)
                    <div class="card bg-white border rounded-lg shadow-md p-4 hover:shadow-lg cursor-pointer transition-transform transform-gpu hover:scale-105"
                        onclick="selectPart('{{ $item_kaki }}', 'kaki')" id="card_kaki_{{ $item_kaki_key }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px"> <!-- Larger X3D Preview -->
                                <scene>
                                    <inline url="/storage/{{ $item_kaki }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @foreach ($x3d_chair->kaki_originalname as $item_kaki_name_key => $item_kaki_name)
                                    @php
                                        $filename = pathinfo($item_kaki_name, PATHINFO_FILENAME);
                                    @endphp
                                    @if ($item_kaki_key === $loop->index)
                                        {{ $filename }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <input type="radio" name="item_kaki" value="{{ $item_kaki }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <h3 class="text-2xl mt-6">Custom Senderan</h3>
            <!-- Card layout for choosing Senderan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($x3d_chair->senderan_filepath as $item_senderan_key => $item_senderan)
                    <div class="card bg-white border rounded-lg shadow-md p-4 hover:shadow-lg cursor-pointer transition-transform transform-gpu hover:scale-105"
                        onclick="selectPart('{{ $item_senderan }}', 'senderan')" id="card_senderan_{{ $item_senderan_key }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px"> <!-- Larger X3D Preview -->
                                <scene>
                                    <inline url="/storage/{{ $item_senderan }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @foreach ($x3d_chair->senderan_originalname as $item_senderan_name_key => $item_senderan_name)
                                    @php
                                        $filename = pathinfo($item_senderan_name, PATHINFO_FILENAME);
                                    @endphp
                                    @if ($item_senderan_key === $loop->index)
                                        {{ $filename }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <input type="radio" name="item_senderan" value="{{ $item_senderan }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <div
                class="my-6 min-h-60 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                    <h1 class="text-4xl text-blue-400">Hasil Kustomisasi</h1>
                    <span>Catatan: Tekan tombol a di keyboard jika hasil tidak muncul di box scene</span>
                    <div id="userModel_0" class="w-1/2" style="display: none;">
                        <x3d width="100%" height="470px">
                            <scene id="x3dContent_0"></scene>
                        </x3d>
                    </div>
                </div>
            </div>

            <button onclick="applyChanges(0)" type="button"
                class="inline-flex items-center justify-center gap-2 rounded-md border border-transparent bg-blue-600 py-2 px-3 text-sm font-semibold text-white transition-all hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                Apply
            </button>
        </div>

        <!-- Error Warning Modal -->
        <div id="warningModal" class="fixed inset-0 flex justify-center items-center bg-gray-900 bg-opacity-75"
            style="display: none;">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-lg font-bold">Warning</h2>
                <p>You must choose your product 3D model part.</p>
                <button onclick="closeWarningModal()" class="mt-4 bg-blue-600 text-white py-2 px-4 rounded">OK</button>
            </div>
        </div>

        <script>
            var selectedPapan = null;
            var selectedKaki = null;
            var selectedSenderan = null;

            function selectPart(value, type) {
                if (type === 'papan') {
                    selectedPapan = value;
                } else if (type === 'kaki') {
                    selectedKaki = value;
                } else if (type === 'senderan'){
                    selectedSenderan = value;
                }

                var allCards = document.querySelectorAll(`.card[onclick*="${type}"]`);
                allCards.forEach(card => card.classList.remove('bg-blue-50', 'border-blue-600'));

                var selectedCard = document.querySelector(`.card[onclick="selectPart('${value}', '${type}')"]`);
                if (selectedCard) {
                    selectedCard.classList.add('bg-blue-50', 'border-blue-600');
                }
            }

            function applyChanges() {
                if (!selectedPapan || !selectedKaki || !selectedSenderan) { // If any part is not selected
                    document.getElementById('warningModal').style.display = 'flex'; // Show warning modal
                    return; // Exit the function without applying changes
                }

                var x3dContent = document.getElementById('x3dContent_0');
                x3dContent.innerHTML = ''; // Clear previous content

                if (selectedPapan) {
                    x3dContent.innerHTML += `<inline url="/storage/${selectedPapan}" />`;
                }
                if (selectedKaki) {
                    x3dContent.innerHTML += `<inline url="/storage/${selectedKaki}" />`;
                }
                if (selectedSenderan) {
                    x3dContent.innerHTML += `<inline url="/storage/${selectedSenderan}" />`;
                }

                document.getElementById('userModel_0').style.display = 'block';
            }

            function closeWarningModal() {
                document.getElementById('warningModal').style.display = 'none';
            }
        </script>
    </section>
</div>
