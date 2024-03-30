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

        @foreach ($x3d_tables as $index => $x3d_table)
            <div class="m-6">
                <h3 class="text-2xl">Custom Papan</h3>
                <div id="radioButtons_papan_{{ $index }}">
                    @foreach ($x3d_table->papan_filepath as $item_papan_key => $item_papan)
                        <input type="radio" name="item_papan_{{ $index }}" value="{{ $item_papan }}"
                            {{ $loop->first ? 'checked' : '' }}>
                        @foreach ($x3d_table->papan_originalname as $item_papan_name_key => $item_papan_name)
                            @if ($item_papan_key === $loop->index)
                                <label>{{ $item_papan_name }}</label>
                            @endif
                        @endforeach
                        <br>
                    @endforeach
                </div>
                <br>
                <h3 class="text-2xl">Custom Kaki</h3>
                <div id="radioButtons_kaki_{{ $index }}">
                    @foreach ($x3d_table->kaki_filepath as $item_kaki_key => $item_kaki)
                        <input type="radio" name="item_kaki_{{ $index }}" value="{{ $item_kaki }}"
                            {{ $loop->first ? 'checked' : '' }}>
                        @foreach ($x3d_table->kaki_originalname as $item_kaki_name_key => $item_kaki_name)
                            @if ($item_kaki_key === $loop->index)
                                <label>{{ $item_kaki_name }}</label>
                            @endif
                        @endforeach
                        <br>
                    @endforeach
                </div>

                <div
                    class="my-6 min-h-60 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                        <h1 class="text-4xl text-blue-400">Hasil Kustomisasi</h1>
                        <span>Catatan: Tekan tombol a di keyboard jika hasil tidak muncul di box scene </span>
                        <div id="userModel_{{ $index }}" style="display: none;">
                            <x3d width="476px" height="233px">
                                <scene id="x3dContent_{{ $index }}">
                                </scene>
                            </x3d>
                        </div>
                    </div>
                </div>


                <button onclick="applyChanges({{ $index }})" type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-md border border-transparent bg-blue-600 py-2 px-3 text-sm font-semibold text-white transition-all hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Apply
                </button>
            </div>
        @endforeach

        <script>
            function applyChanges(index) {
                var selectedPapan = document.querySelector('input[name="item_papan_' + index + '"]:checked').value;
                var selectedKaki = document.querySelector('input[name="item_kaki_' + index + '"]:checked').value;

                var x3dContent = document.getElementById('x3dContent_' + index);
                x3dContent.innerHTML = ''; // Clear previous content

                // Add Papan and Kaki as separate inline elements
                x3dContent.innerHTML += `<inline url="/storage/${selectedPapan}" />`;
                x3dContent.innerHTML += `<inline url="/storage/${selectedKaki}" />`;

                document.getElementById('userModel_' + index).style.display = 'block';
            }
        </script>
    </section>
</div>
