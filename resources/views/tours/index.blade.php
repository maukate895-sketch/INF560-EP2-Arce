
<x-layout title="Catálogo de Tours - TuriPotosí">

    @php
        $colores = [
            'historico-cultural' => '#A58B65',
            'minero' => '#8B6650',
            'naturaleza' => '#66866C',
            'gastronomico' => '#C58B58',
            'aventura' => '#668A9B',
        ];

        $colorActual = $colores[request('categoria')] ?? '#536B59';
    @endphp

    <!-- Encabezado -->
    <section class="bg-[#E4E8DF] py-10">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <span
                class="inline-block text-white text-sm font-semibold px-4 py-2 rounded-full mb-3"
                style="background-color: {{ $colorActual }}"
            >
                Explora Potosí
            </span>

            <h1 class="text-3xl md:text-4xl font-bold text-[#354C40]">
                Nuestros Tours
            </h1>

            <p class="text-[#536B59] mt-2">
                Encuentra tu próxima experiencia en Potosí.
            </p>

        </div>
    </section>

    <!-- Buscador compacto -->
    <section class="max-w-7xl mx-auto px-6 pt-8">

        <form action="{{ route('tours.index') }}" method="GET"
              class="bg-white rounded-xl shadow-sm border border-[#E4E8DF] p-4 mb-9">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[1fr_1fr_auto] gap-3 items-end">

                <!-- Buscar por nombre -->
                <div>
                    <label for="buscar"
                           class="block text-sm font-semibold text-[#354C40] mb-1">
                        Buscar tour
                    </label>

                    <input
                        type="text"
                        id="buscar"
                        name="buscar"
                        value="{{ request('buscar') }}"
                        placeholder="Ej. Cerro Rico..."
                        class="w-full border border-[#D9DFD3] rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#536B59]"
                    >
                </div>

                <!-- Categorías -->
                <div>
                    <label for="categoria"
                           class="block text-sm font-semibold text-[#354C40] mb-1">
                        Categoría
                    </label>

                    <select
                        id="categoria"
                        name="categoria"
                        class="w-full border border-[#D9DFD3] rounded-lg px-3 py-2.5 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#536B59]"
                    >
                        <option value="">Todas las categorías</option>

                        @foreach($categorias as $categoria)
                            <option
                                value="{{ $categoria->slug }}"
                               @selected(request('categoria') == $categoria->slug)
                            >
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Botones -->
                <div class="flex gap-2">

                    <button
                        type="submit"
                        class="flex-1 bg-[#536B59] hover:bg-[#354C40] text-white rounded-lg px-5 py-2.5 text-sm font-bold transition"
                    >
                        <span class="inline-flex items-center gap-2">
                            <span>⌕</span>
                            Explorar
                        </span>
                    </button>

                    <a
                        href="{{ route('tours.index') }}"
                        class="bg-[#E4E8DF] hover:bg-[#D9DFD3] text-[#354C40] rounded-lg px-4 py-2.5 text-sm font-semibold transition"
                    >
                        Limpiar
                    </a>

                </div>

            </div>
        </form>

    </section>

    <!-- Resultados -->
    <section class="max-w-7xl mx-auto px-6 pb-10">

        <div class="flex flex-wrap justify-between items-center gap-3 mb-6">

            <div>
                <h2 class="text-2xl font-bold text-[#354C40]">
                    Tours disponibles
                </h2>

                <p class="text-sm text-[#66806B] mt-1">
                    Descubre experiencias únicas en nuestra tierra.
                </p>
            </div>

            <span class="bg-[#E4E8DF] text-[#354C40] px-4 py-2 rounded-full text-sm font-semibold">
                {{ $tours->total() }} resultados
            </span>

        </div>

        <!-- Tarjetas de tours -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">

            @forelse($tours as $tour)

                <x-tour-card :tour="$tour" />

            @empty

                <div class="col-span-full bg-white rounded-xl border border-[#E4E8DF] p-10 text-center">

                    <div class="text-5xl mb-4">🔎</div>

                    <h2 class="text-2xl font-bold text-[#354C40]">
                        No se encontraron tours
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Intenta cambiar el nombre o seleccionar otra categoría.
                    </p>

                    <a href="{{ route('tours.index') }}"
                       class="inline-block mt-5 bg-[#536B59] hover:bg-[#354C40] text-white px-6 py-3 rounded-lg font-semibold transition">
                        Ver todos los tours
                    </a>

                </div>

            @endforelse

        </div>

        <!-- Paginación -->
        <div class="mt-10">
            {{ $tours->links() }}
        </div>

    </section>

</x-layout>
