
<x-layout :title="$tour->titulo . ' - TuriPotosí'">

    @php
        $imagenesTours = [
            'recorrido-por-el-cerro-rico' => 'cerro-rico.jpg',
            'visita-a-la-casa-de-la-moneda' => 'casa-de-la-moneda.jpg',
            'tour-por-las-lagunas-de-kari-kari' => 'lagunas-kari-kari.jpg',
            'ruta-gastronomica-potosina' => 'ruta-gastronomica-potosina.jpg',
            'aventura-en-el-salar-de-uyuni' => 'salar-de-uyuni.jpg',
            'recorrido-por-el-centro-historico' => 'centro-historico.jpg',
            'experiencia-minera-tradicional' => 'experiencia-minera.jpg',
            'caminata-por-paisajes-andinos' => 'paisajes-andinos.jpg',
            'sabores-tradicionales-de-potosi' => 'sabores-tradicionales.jpg',
            'aventura-en-montanas-potosinas' => 'montanas-potosinas.jpg',
            'ruta-de-iglesias-coloniales' => 'iglesias-coloniales.jpg',
            'exploracion-de-paisajes-naturales' => 'paisajes-naturales.jpg',
        ];

        $imagen = isset($imagenesTours[$tour->slug])
            ? asset('images/' . $imagenesTours[$tour->slug])
            : ($tour->imagen
                ? asset('storage/' . $tour->imagen)
                : asset('images/cerro-rico.jpg'));
    @endphp

    <section class="bg-[#F3F0E8] min-h-screen py-10 px-5">
        <div class="max-w-6xl mx-auto">

            <a href="{{ route('tours.index') }}"
               class="inline-flex items-center gap-2 text-[#536B59] font-bold hover:text-[#A58B65] transition mb-6">
                <span>←</span> Volver al catálogo
            </a>

            <article class="bg-white rounded-3xl overflow-hidden shadow-xl border border-[#E4E8DF]">

                <!-- Fotografía principal -->
                <div class="relative h-72 md:h-[480px] overflow-hidden">
                    <img src="{{ $imagen }}"
                         alt="{{ $tour->titulo }}"
                         class="w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t from-[#17291f]/80 via-transparent to-transparent"></div>

                    <div class="absolute bottom-8 left-6 md:left-10 right-6">
                        <span class="inline-block bg-[#A58B65] text-white px-4 py-2 rounded-full text-sm font-bold mb-4 shadow">
                            {{ $tour->categoria->nombre }}
                        </span>

                        <h1 class="text-3xl md:text-5xl font-extrabold text-white drop-shadow-lg">
                            {{ $tour->titulo }}
                        </h1>
                    </div>
                </div>

                <div class="p-6 md:p-10">

                    <!-- Descripción -->
                    <div class="max-w-4xl">
                        <p class="text-sm font-bold tracking-[0.2em] text-[#A58B65]">
                            DESCUBRE POTOSÍ
                        </p>

                        <h2 class="text-2xl md:text-3xl font-bold text-[#354C40] mt-2">
                            Una experiencia inolvidable
                        </h2>

                        <p class="text-gray-600 mt-5 leading-8 text-base">
                            {{ $tour->descripcion }}
                        </p>
                    </div>

                    <!-- Información del tour -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-9">

                        <div class="bg-[#F3F0E8] rounded-2xl p-5 border border-[#D8C39A]">
                            <div class="text-3xl mb-3">💰</div>
                            <p class="text-sm text-gray-600">Precio por persona</p>
                            <p class="text-2xl font-extrabold text-[#A58B65] mt-1">
                                Bs. {{ number_format($tour->precio, 2) }}
                            </p>
                        </div>

                        <div class="bg-[#F3F0E8] rounded-2xl p-5 border border-[#D8C39A]">
                            <div class="text-3xl mb-3">⏱️</div>
                            <p class="text-sm text-gray-600">Duración</p>
                            <p class="text-xl font-bold text-[#354C40] mt-1">
                                {{ $tour->duracion_horas }} horas
                            </p>
                        </div>

                        <div class="bg-[#F3F0E8] rounded-2xl p-5 border border-[#D8C39A]">
                            <div class="text-3xl mb-3">📅</div>
                            <p class="text-sm text-gray-600">Fecha de salida</p>
                            <p class="text-xl font-bold text-[#354C40] mt-1">
                                {{ $tour->fecha_salida->format('d/m/Y') }}
                            </p>
                        </div>

                        <div class="bg-[#F3F0E8] rounded-2xl p-5 border border-[#D8C39A]">
                            <div class="text-3xl mb-3">👥</div>
                            <p class="text-sm text-gray-600">Cupos disponibles</p>
                            <p class="text-xl font-bold text-[#354C40] mt-1">
                                {{ $tour->cupos_disponibles }}
                            </p>
                        </div>

                    </div>

                    <!-- Servicios -->
                    <div class="mt-12">
                        <p class="text-sm font-bold tracking-[0.2em] text-[#A58B65]">
                            INCLUYE TU EXPERIENCIA
                        </p>

                        <h2 class="text-2xl font-bold text-[#354C40] mt-2 mb-6">
                            Servicios incluidos
                        </h2>

                        <div class="flex flex-wrap gap-3">
                            @forelse($tour->servicios as $servicio)
                                <span class="inline-flex items-center gap-2 bg-[#E4E8DF] text-[#354C40] px-5 py-3 rounded-xl font-semibold border border-[#B9C8B8]">
                                    <span class="text-[#536B59] font-extrabold">✓</span>
                                    {{ $servicio->nombre }}
                                </span>
                            @empty
                                <p class="text-gray-500">
                                    No se registraron servicios para este tour.
                                </p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Guía turístico -->
                    <div class="mt-10 bg-gradient-to-r from-[#354C40] to-[#536B59] rounded-2xl p-6 md:p-8 text-white shadow-lg">
                        <div class="flex items-center gap-5">
                            <div class="w-16 h-16 rounded-full bg-[#D8C39A] text-[#354C40] flex items-center justify-center text-3xl shadow-md">
                                👨‍🏫
                            </div>

                            <div>
                                <p class="text-[#E4E8DF] text-sm font-medium">
                                    Tu acompañante durante el recorrido
                                </p>

                                <h2 class="text-2xl font-bold mt-1 text-white">
                                    {{ $tour->guia?->name ?? 'Guía por asignar' }}
                                </h2>

                                <p class="text-sm text-[#D8C39A] mt-1 font-semibold">
                                    Guía turístico
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Reserva -->
                    <div class="text-center mt-10">
                        @auth
                            <a href="{{ route('reservas.create', $tour->slug) }}"
                               class="inline-flex items-center justify-center gap-3 bg-[#354C40] hover:bg-[#A58B65] text-white font-extrabold px-10 py-4 rounded-xl shadow-lg transition-all duration-300 hover:-translate-y-1">
                                Reservar ahora
                                <span class="text-xl">→</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="inline-flex items-center justify-center gap-3 bg-[#354C40] hover:bg-[#A58B65] text-white font-extrabold px-10 py-4 rounded-xl shadow-lg transition-all duration-300 hover:-translate-y-1">
                                Inicia sesión para reservar
                                <span class="text-xl">→</span>
                            </a>
                        @endauth
                    </div>

                </div>
            </article>
        </div>
    </section>

</x-layout>
