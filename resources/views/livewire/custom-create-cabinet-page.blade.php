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
            <h3 class="text-2xl">Custom Part 1</h3>
            <!-- Card layout for choosing add1 -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($x3d_cabinet->add1_filepath as $item_add1_key => $item_add1)
                    <div class="card transform-gpu cursor-pointer rounded-lg border bg-white p-4 shadow-md transition-transform hover:scale-105 hover:shadow-lg dark:bg-slate-900"
                        onclick="selectPart('{{ $item_add1 }}', 'add1')" id="card_add1_{{ $item_add1_key }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px"> <!-- Larger X3D Preview -->
                                <scene>
                                    <inline url="/storage/{{ $item_add1 }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @foreach ($x3d_cabinet->add1_originalname as $item_add1_name_key => $item_add1_name)
                                    @php
                                        $filename = pathinfo($item_add1_name, PATHINFO_FILENAME);
                                    @endphp
                                    @if ($item_add1_key === $loop->index)
                                        {{ $filename }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <input type="radio" name="item_add1" value="{{ $item_add1 }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <h3 class="mt-6 text-2xl">Custom Part 2</h3>
            <!-- Card layout for choosing laci -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($x3d_cabinet->add2_filepath as $item_add2_key => $item_add2)
                    <div class="card transform-gpu cursor-pointer rounded-lg border bg-white p-4 shadow-md transition-transform hover:scale-105 hover:shadow-lg dark:bg-slate-900"
                        onclick="selectPart('{{ $item_add2 }}', 'add2')" id="card_add2_{{ $item_add2_key }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px"> <!-- Larger X3D Preview -->
                                <scene>
                                    <inline url="/storage/{{ $item_add2 }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @foreach ($x3d_cabinet->add2_originalname as $item_add2_name_key => $item_add2_name)
                                    @php
                                        $filename = pathinfo($item_add2_name, PATHINFO_FILENAME);
                                    @endphp
                                    @if ($item_add2_key === $loop->index)
                                        {{ $filename }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <input type="radio" name="item_add2" value="{{ $item_add2 }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <h3 class="mt-6 text-2xl">Custom Part 3</h3>
            <!-- Card layout for choosing Senderan -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($x3d_cabinet->add3_filepath as $item_add3_key => $item_add3)
                    <div class="card transform-gpu cursor-pointer rounded-lg border bg-white p-4 shadow-md transition-transform hover:scale-105 hover:shadow-lg dark:bg-slate-900"
                        onclick="selectPart('{{ $item_add3 }}', 'add3')" id="card_add3_{{ $item_add3_key }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px"> <!-- Larger X3D Preview -->
                                <scene>
                                    <inline url="/storage/{{ $item_add3 }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @foreach ($x3d_cabinet->add3_originalname as $item_add3_name_key => $item_add3_name)
                                    @php
                                        $filename = pathinfo($item_add3_name, PATHINFO_FILENAME);
                                    @endphp
                                    @if ($item_add3_key === $loop->index)
                                        {{ $filename }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <input type="radio" name="item_add3" value="{{ $item_add3 }}" style="display: none;" />
                    </div>
                @endforeach
            </div>

            <h3 class="mt-6 text-2xl">Custom Part 4</h3>
            <!-- Card layout for choosing Senderan -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($x3d_cabinet->add4_filepath as $item_add4_key => $item_add4)
                    <div class="card transform-gpu cursor-pointer rounded-lg border bg-white p-4 shadow-md transition-transform hover:scale-105 hover:shadow-lg dark:bg-slate-900"
                        onclick="selectPart('{{ $item_add4 }}', 'add4')" id="card_add4_{{ $item_add4_key }}">
                        <div class="flex flex-col items-center">
                            <x3d width="100px" height="100px"> <!-- Larger X3D Preview -->
                                <scene>
                                    <inline url="/storage/{{ $item_add4 }}" />
                                </scene>
                            </x3d>
                            <div class="mt-2">
                                @foreach ($x3d_cabinet->add4_originalname as $item_add4_name_key => $item_add4_name)
                                    @php
                                        $filename = pathinfo($item_add4_name, PATHINFO_FILENAME);
                                    @endphp
                                    @if ($item_add4_key === $loop->index)
                                        {{ $filename }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <input type="radio" name="item_add4" value="{{ $item_add4 }}" style="display: none;" />
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
            var selectedAdd1 = null;
            var selectedAdd2 = null;
            var selectedAdd3 = null;
            var selectedAdd4 = null;

            function selectPart(value, type) {
                if (type === 'add1') {
                    selectedAdd1 = value;
                } else if (type === 'add2') {
                    selectedAdd2 = value;
                } else if (type === 'add3'){
                    selectedAdd3 = value;
                }  else if (type === 'add4'){
                    selectedAdd4 = value;
                }
                var allCards = document.querySelectorAll(`.card[onclick*="${type}"]`);
                allCards.forEach(card => card.classList.remove('bg-blue-50', 'border-blue-600'));

                var selectedCard = document.querySelector(`.card[onclick="selectPart('${value}', '${type}')"]`);
                if (selectedCard) {
                    selectedCard.classList.add('bg-blue-50', 'border-blue-600');
                }
            }

            function applyChanges() {
                if (!selectedAdd1 || !selectedAdd2 || !selectedAdd3 || !selectedAdd4) { // If any part is not selected
                    document.getElementById('warningModal').style.display = 'flex'; // Show warning modal
                    return; // Exit the function without applying changes
                }

                var x3dContent = document.getElementById('x3dContent_0');
                x3dContent.innerHTML = ''; // Clear previous content

                if (selectedAdd1) {
                    x3dContent.innerHTML += `<inline url="/storage/${selectedAdd1}" />`;
                }
                if (selectedAdd2) {
                    x3dContent.innerHTML += `<inline url="/storage/${selectedAdd2}" />`;
                }
                if (selectedAdd3) {
                    x3dContent.innerHTML += `<inline url="/storage/${selectedAdd3}" />`;
                }
                if (selectedAdd4) {
                    x3dContent.innerHTML += `<inline url="/storage/${selectedAdd4}" />`;
                }

                document.getElementById('userModel_0').style.display = 'block';
            }

            function closeWarningModal() {
                document.getElementById('warningModal').style.display = 'none';
            }
        </script>
    </section>
</div>
