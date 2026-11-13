
<x-layout title="Mis reservas | TuriPotosí">

    <section class="min-h-screen bg-[#F3F0E8] py-12 px-5">

        <div class="max-w-6xl mx-auto">

            <!-- Encabezado -->
            <div class="text-center mb-10">
                <p class="text-sm font-bold tracking-[0.2em] text-[#A58B65]">
                    TUS EXPERIENCIAS
                </p>

                <h1 class="text-3xl md:text-4xl font-extrabold text-[#354C40] mt-3">
                    Mis reservas
                </h1>

                <p class="text-gray-600 mt-3">
                    Consulta y administra tus próximas aventuras por Potosí.
                </p>
            </div>

            <!-- Mensajes de error -->
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Lista de reservas -->
            @forelse ($reservas as $reserva)

                @php
                    $estados = [
                        'pending' => [
                            'texto' => 'Pendiente',
                            'color' => 'bg-amber-100 text-amber-800',
                        ],
                        'confirmed' => [
                            'texto' => 'Confirmada',
                            'color' => 'bg-green-100 text-green-800',
                        ],
                        'cancelled' => [
                            'texto' => 'Cancelada',
                            'color' => 'bg-red-100 text-red-800',
                        ],
                    ];

                    $estado = $estados[$reserva->estado] ?? [
                        'texto' => ucfirst($reserva->estado),
                        'color' => 'bg-gray-100 text-gray-700',
                    ];
                @endphp

                <article class="bg-white rounded-2xl shadow-md border border-[#E4E8DF] overflow-hidden mb-6">

                    <div class="p-6 md:p-8">

                        <div class="flex flex-wrap justify-between items-center gap-3 mb-5">

                            <span class="text-sm font-bold text-[#A58B65]">
                                RESERVA #{{ $reserva->id }}
                            </span>

                            <span class="px-4 py-2 rounded-full text-sm font-bold {{ $estado['color'] }}">
                                {{ $estado['texto'] }}
                            </span>

                        </div>

                        <h2 class="text-2xl font-bold text-[#354C40]">
                            {{ $reserva->tour->titulo }}
                        </h2>

                        <p class="text-[#8B7655] font-semibold mt-2">
                            {{ $reserva->tour->categoria->nombre ?? 'Destino turístico' }}
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">

                            <div class="bg-[#F3F0E8] rounded-xl p-4">
                                <p class="text-sm text-gray-500">Personas</p>
                                <p class="text-lg font-bold text-[#354C40] mt-1">
                                    {{ $reserva->cantidad_personas }}
                                </p>
                            </div>

                            <div class="bg-[#F3F0E8] rounded-xl p-4">
                                <p class="text-sm text-gray-500">Precio por persona</p>
                                <p class="text-lg font-bold text-[#354C40] mt-1">
                                    Bs. {{ number_format($reserva->tour->precio, 2) }}
                                </p>
                            </div>

                            <div class="bg-[#F3F0E8] rounded-xl p-4">
                                <p class="text-sm text-gray-500">Fecha de reserva</p>
                                <p class="text-lg font-bold text-[#354C40] mt-1">
                                    {{ $reserva->created_at->format('d/m/Y') }}
                                </p>
                            </div>

                        </div>

                        @if ($reserva->observacion)
                            <div class="mt-5">
                                <p class="text-sm font-bold text-[#354C40]">
                                    Observaciones
                                </p>
                                <p class="text-gray-600 mt-1">
                                    {{ $reserva->observacion }}
                                </p>
                            </div>
                        @endif

                        <div class="flex flex-wrap gap-3 mt-7">

                            <a href="{{ route('tours.show', $reserva->tour->slug) }}"
                               class="inline-flex items-center justify-center bg-[#536B59] hover:bg-[#354C40] text-white px-6 py-3 rounded-xl font-bold transition">
                                Ver destino →
                            </a>

                            @if ($reserva->estado === 'pending')
                                <form action="{{ route('reservas.cancelar', $reserva) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Estás seguro de cancelar esta reserva?')">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-bold transition">
                                        Cancelar reserva
                                    </button>

                                </form>
                            @endif

                        </div>

                    </div>

                </article>

            @empty

                <div class="bg-white rounded-3xl shadow-md text-center py-16 px-6 border border-[#E4E8DF]">

                    <div class="text-5xl mb-5">🧭</div>

                    <h2 class="text-2xl font-bold text-[#354C40]">
                        Aún no tienes reservas
                    </h2>

                    <p class="text-gray-500 mt-3">
                        Explora nuestros destinos y comienza tu próxima aventura.
                    </p>

                    <a href="{{ route('tours.index') }}"
                       class="inline-flex mt-7 bg-[#354C40] hover:bg-[#536B59] text-white font-bold px-8 py-3 rounded-xl transition">
                        Explorar tours →
                    </a>

                </div>

            @endforelse

            <div class="mt-8">
                {{ $reservas->links() }}
            </div>

        </div>

    </section>

</x-layout>
