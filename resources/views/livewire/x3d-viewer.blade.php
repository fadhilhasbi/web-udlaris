<div>
    <div class="container my-24 py-6 mx-auto md:px-6">
        <section class="mb-32">
            <x3d width='600px' height='370px'>
                <scene>
                    <shape>
                        <appearance>
                            <material diffuseColor='1 0 0'></material>
                        </appearance>
                        <box></box>
                    </shape>
                </scene>
            </x3d>

            <h1 class="mb-6 text-3xl font-bold">
                This is your custom product
            </h1>

            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi
                harum tempore cupiditate asperiores provident, itaque, quo ex iusto
                rerum voluptatum delectus corporis quisquam maxime a ipsam nisi
                sapiente qui optio! Dignissimos harum quod culpa officiis suscipit
                soluta labore! Expedita quas, nesciunt similique autem, sunt,
                doloribus pariatur maxime qui sint id enim. Placeat, maxime labore.
                Dolores ex provident ipsa impedit, omnis magni earum. Sed fuga ex
                ducimus consequatur corporis, architecto nesciunt vitae ipsum
                consequuntur perspiciatis nulla esse voluptatem quos dolorum delectus
                similique eum vero in est velit quasi pariatur blanditiis incidunt
                quam.
            </p>
        </section>
    </div>

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

            <h1 class="text-4xl text-blue-400">Hasil Kustomisasi</h1>
            <div id="userModel_{{ $index }}" style="display: none;">
                <x3d width="476px" height="233px">
                    <scene id="x3dContent_{{ $index }}">
                    </scene>
                </x3d>
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


</div>
