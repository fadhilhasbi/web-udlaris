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
            <h3 class="text-2xl">Custom Papan</h3>
            <!-- Card layout for choosing Papan -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($x3d_chair->papan_filepath as $item_papan_key => $item_papan)
                    <div class="card transform-gpu cursor-pointer rounded-lg border bg-white p-4 shadow-md transition-transform hover:scale-105 hover:shadow-lg dark:bg-slate-900"
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

            <h3 class="mt-6 text-2xl">Custom Kaki</h3>
            <!-- Card layout for choosing laci -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($x3d_chair->kaki_filepath as $item_kaki_key => $item_kaki)
                    <div class="card transform-gpu cursor-pointer rounded-lg border bg-white p-4 shadow-md transition-transform hover:scale-105 hover:shadow-lg dark:bg-slate-900"
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

            <h3 class="mt-6 text-2xl">Custom Senderan</h3>
            <!-- Card layout for choosing Senderan -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($x3d_chair->senderan_filepath as $item_senderan_key => $item_senderan)
                    <div class="card transform-gpu cursor-pointer rounded-lg border bg-white p-4 shadow-md transition-transform hover:scale-105 hover:shadow-lg dark:bg-slate-900"
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
                <button onclick="closeWarningModal()" class="mt-4 rounded bg-blue-600 px-4 py-2 text-white">OK</button>
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
