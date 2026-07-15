<x-layout>
    <section>
        <div class="container mt-4">
            <h1>Ejem blockly</h1>

            <div class="btn-group mb-3" role="group" aria-label="Selector de lenguaje">
                <button type="button" class="btn btn-dark active" id="btnHtml"
                    onclick="seleccionarLenguaje('html')">HTML</button>
                <button type="button" class="btn btn-outline-dark" id="btnCss"
                    onclick="seleccionarLenguaje('css')">CSS</button>
            </div>

            <div style="position: relative; width: 100%; height: 500px; border: 1px solid #ccc;">
                <div id="blocklyDiv" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></div>
            </div>

            <button id="btnVer" class="btn btn-primary mt-3">Ver</button>
        </div>


        <script>
            window.BlocklyData = {
                bloques: @json($bloques),
                toolboxes: @json($toolboxes),
                config: @json($config)
            };
        </script>

    </section>
</x-layout>
