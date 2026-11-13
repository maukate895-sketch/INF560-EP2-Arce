
<x-layout title="Inicio | TuriPotosí">
<!-- PORTADA PRINCIPAL -->
<section class="relative min-h-[480px] md:min-h-[570px] flex items-center justify-center overflow-hidden">

    <!-- Imagen de fondo -->
    <div class="absolute inset-0">
        <img
            src="{{ asset('images/cerro-rico.jpg') }}"
            alt="Paisaje panorámico del Cerro Rico de Potosí"
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-b from-[#17291f]/65 via-[#17291f]/55 to-[#17291f]/75"></div>
    </div>

    <!-- Texto de portada -->
    <div class="relative z-10 max-w-5xl mx-auto px-6 py-20 text-center">

        <div class="flex items-center justify-center gap-4 mb-6">
            <span class="h-px w-12 md:w-20 bg-[#C5A36B]"></span>
            <span class="text-[#E5D2A9] text-xs md:text-sm font-bold tracking-[0.3em]">
                BIENVENIDOS A POTOSÍ
            </span>
            <span class="h-px w-12 md:w-20 bg-[#C5A36B]"></span>
        </div>

        <div class="text-[#D9C49C] text-4xl mb-3">
            ♢
        </div>

        <h1 class="text-4xl sm:text-5xl md:text-7xl font-extrabold text-white leading-tight drop-shadow-lg">
            Descubre la
            <span class="block">Villa Imperial</span>
        </h1>

        <p class="text-[#F3F0E8] text-base md:text-xl mt-6 max-w-3xl mx-auto leading-relaxed">
            Historia, cultura y naturaleza en cada experiencia.
        </p>

        <div class="mt-9">
            <a href="{{ route('tours.index') }}"
               class="inline-flex items-center gap-3 bg-[#C5A36B] hover:bg-[#D8B77D] text-[#354C40] font-bold px-8 py-4 rounded-full shadow-xl transition duration-300 hover:-translate-y-1">
                EXPLORAR TOURS
                <span class="text-xl">→</span>
            </a>
        </div>

        <p class="text-white/70 text-xs tracking-widest mt-8">
            VIVE · DESCUBRE · EXPLORA
        </p>

    </div>
</section>

<!-- SECCION DE DESTINOS TURISTICOS -->
<section class="bg-[#F3F0E8] py-20 px-6">
    <div class="max-w-7xl mx-auto">

        <div class="text-center mb-12">
            <p class="text-[#A58B65] font-bold tracking-[0.25em] text-sm mb-3">
                DESCUBRE POTOSÍ
            </p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#354C40]">
                Destinos que te sorprenderán
            </h2>
            <p class="text-[#647267] mt-4 max-w-2xl mx-auto">
                Explora lugares extraordinarios llenos de historia,
                cultura y paisajes únicos de nuestra Villa Imperial.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- CASA NACIONAL DE MONEDA -->
            <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-2">
                <div class="h-44 md:h-48 overflow-hidden">
                    <img src="{{ asset('images/casa-moneda.jpg') }}"
                         alt="Casa Nacional de Moneda"
                         class="w-full h-full object-cover hover:scale-110 transition duration-500">
                </div>
                <div class="p-5">
                    <span class="text-xs font-bold tracking-wider text-[#A58B65]">
                        HISTORIA Y CULTURA
                    </span>
                    <h3 class="text-xl font-bold text-[#354C40] mt-2">
                        Casa Nacional de Moneda
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed mt-3">
                        Conoce uno de los monumentos históricos más importantes
                        de Bolivia y descubre el legado de Potosí.
                    </p>
                    <a href="{{ route('tours.index', ['categoria' => 'historico-cultural']) }}"
                       class="inline-flex items-center gap-2 mt-5 font-bold text-[#536B59] hover:text-[#A58B65] transition">
                        Explorar destino →
                    </a>
                </div>
            </article>

            <!-- CERRO RICO -->
            <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-2">
                <div class="h-44 md:h-48 overflow-hidden">
                    <img src="{{ asset('images/cerro-rico.jpg') }}"
                         alt="Cerro Rico de Potosí"
                         class="w-full h-full object-cover hover:scale-110 transition duration-500">
                </div>
                <div class="p-5">
                    <span class="text-xs font-bold tracking-wider text-[#8B6650]">
                        TRADICIÓN MINERA
                    </span>
                    <h3 class="text-xl font-bold text-[#354C40] mt-2">
                        Cerro Rico
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed mt-3">
                        Admira el símbolo de Potosí y conoce la historia
                        minera que marcó el desarrollo de la ciudad.
                    </p>
                    <a href="{{ route('tours.index', ['categoria' => 'minero']) }}"
                       class="inline-flex items-center gap-2 mt-5 font-bold text-[#536B59] hover:text-[#A58B65] transition">
                        Explorar destino →
                    </a>
                </div>
            </article>

            <!-- LAGUNA COLORADA -->
            <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-2">
                <div class="h-44 md:h-48 overflow-hidden">
                    <img src="{{ asset('images/laguna-colorada.jpg') }}"
                         alt="Laguna Colorada"
                         class="w-full h-full object-cover hover:scale-110 transition duration-500">
                </div>
                <div class="p-5">
                    <span class="text-xs font-bold tracking-wider text-[#66866C]">
                        NATURALEZA
                    </span>
                    <h3 class="text-xl font-bold text-[#354C40] mt-2">
                        Laguna Colorada
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed mt-3">
                        Maravíllate con sus paisajes naturales, sus aguas
                        rojizas y la belleza del altiplano boliviano.
                    </p>
                    <a href="{{ route('tours.index', ['categoria' => 'naturaleza']) }}"
                       class="inline-flex items-center gap-2 mt-5 font-bold text-[#536B59] hover:text-[#A58B65] transition">
                        Explorar destino →
                    </a>
                </div>
            </article>

        </div>

        <div class="text-center mt-12">
            <a href="{{ route('tours.index') }}"
               class="inline-flex items-center gap-3 bg-[#354C40] hover:bg-[#536B59] text-white font-bold px-9 py-4 rounded-full shadow-lg transition duration-300 hover:-translate-y-1">
                VER TODOS LOS TOURS →
            </a>
        </div>

    </div>
</section>

</x-layout>
