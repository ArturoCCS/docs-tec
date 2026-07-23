<x-layout>
    <x-index.hero />
    <script>
        window.BlocklyData = {
            bloques: @json($bloques2),
            config: @json($config2)
        };
    </script>

    <div class="overflow-x-hidden w-full"> 

        <div class="hero min-h-screen html" id="container">

            <x-index.section title="HTML" position="left" url="/html">
                <img src="https://th.bing.com/th/id/R.629e768e8605d2cbfbf2dd0d5d936fb9?rik=09PvMvG%2bORTnzw&riu=http%3a%2f%2flewiscreative.ca%2fwp-content%2fuploads%2f2021%2f07%2fColoque-Foto.jpg&ehk=%2b15aGAhkhUw19etbbGOZIUWxZ%2bL10wcHVNGI9TozRWE%3d&risl=&pid=ImgRaw&r=0"
                    class="max-w-sm rounded-lg shadow-2xl " />
            </x-index.section>

            <div class="hero bg-base-100  min-h-screen css">
                <x-index.section title="CSS" position="right" url="/css">
                    <img src="https://th.bing.com/th/id/R.629e768e8605d2cbfbf2dd0d5d936fb9?rik=09PvMvG%2bORTnzw&riu=http%3a%2f%2flewiscreative.ca%2fwp-content%2fuploads%2f2021%2f07%2fColoque-Foto.jpg&ehk=%2b15aGAhkhUw19etbbGOZIUWxZ%2bL10wcHVNGI9TozRWE%3d&risl=&pid=ImgRaw&r=0"
                        class="max-w-sm rounded-lg shadow-2xl " />
                </x-index.section>
            </div>

            <div class="hero min-h-screen bg-base-200 js">
                <x-index.section title="JS" position="left" url="/js">
                    <img src="https://th.bing.com/th/id/R.629e768e8605d2cbfbf2dd0d5d936fb9?rik=09PvMvG%2bORTnzw&riu=http%3a%2f%2flewiscreative.ca%2fwp-content%2fuploads%2f2021%2f07%2fColoque-Foto.jpg&ehk=%2b15aGAhkhUw19etbbGOZIUWxZ%2bL10wcHVNGI9TozRWE%3d&risl=&pid=ImgRaw&r=0"
                        class="max-w-sm rounded-lg shadow-2xl" />
                </x-index.section>
            </div>

            <div class="hero bg-base-300 min-h-screen php">
                <x-index.section title="PHP" position="right" url="/php" >
                    <img src="https://th.bing.com/th/id/R.629e768e8605d2cbfbf2dd0d5d936fb9?rik=09PvMvG%2bORTnzw&riu=http%3a%2f%2flewiscreative.ca%2fwp-content%2fuploads%2f2021%2f07%2fColoque-Foto.jpg&ehk=%2b15aGAhkhUw19etbbGOZIUWxZ%2bL10wcHVNGI9TozRWE%3d&risl=&pid=ImgRaw&r=0"
                        class="max-w-sm rounded-lg shadow-2xl" />
                </x-index.section>
            </div>

        </div>

    </div>

</x-layout>