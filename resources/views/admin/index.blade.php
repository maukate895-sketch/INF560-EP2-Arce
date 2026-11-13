
<x-layout title="Panel de administración | TuriPotosí">

    <section class="max-w-7xl mx-auto px-6 py-10">

        <!-- Encabezado -->
        <div class="mb-10">
            <p class="text-sm font-bold tracking-widest text-[#A58B65] uppercase">
                Administración
            </p>

            <h1 class="text-3xl md:text-4xl font-bold text-[#354C40] mt-2">
                Panel de control
            </h1>

            <p class="text-gray-600 mt-2">
                Bienvenido al sistema de gestión turística de TuriPotosí.
            </p>
        </div>

        <!-- Estadísticas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">

            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-[#536B59]">
                <p class="text-gray-500 text-sm">Tours registrados</p>
                <h2 class="text-3xl font-bold text-[#354C40] mt-2">
                    {{ $totalTours }}
                </h2>
                <p class="text-sm text-gray-400 mt-2">Total de tours</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-[#A58B65]">
                <p class="text-gray-500 text-sm">Reservas realizadas</p>
                <h2 class="text-3xl font-bold text-[#354C40] mt-2">
                    {{ $totalReservas }}
                </h2>
                <p class="text-sm text-gray-400 mt-2">Total de reservas</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-blue-500">
                <p class="text-gray-500 text-sm">Usuarios registrados</p>
                <h2 class="text-3xl font-bold text-[#354C40] mt-2">
                    {{ $totalUsuarios }}
                </h2>
                <p class="text-sm text-gray-400 mt-2">Turistas y guías</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-amber-500">
                <p class="text-gray-500 text-sm">Reservas pendientes</p>
                <h2 class="text-3xl font-bold text-[#354C40] mt-2">
                    {{ $reservasPendientes }}
                </h2>
                <p class="text-sm text-gray-400 mt-2">Por revisar</p>
            </div>

        </div>

        <!-- Últimas reservas -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-10">

            <div class="px-6 py-5 border-b border-gray-100">
                <h2 class="text-xl font-bold text-[#354C40]">
                    Últimas reservas
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Actividad reciente de los turistas.
                </p>
            </div>

            @forelse($ultimasReservas as $reserva)

                <div class="px-6 py-5 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-3">

                    <div>
                        <h3 class="font-bold text-[#354C40]">
                            {{ $reserva->tour->titulo ?? 'Tour no disponible' }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Turista: {{ $reserva->user->name ?? 'Usuario no disponible' }}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ $reserva->cantidad_personas }} persona(s)
                        </p>
                    </div>

                    <div class="flex items-center gap-3">

                        @if($reserva->estado === 'pending')
                            <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-xs font-bold">
                                Pendiente
                            </span>
                        @elseif($reserva->estado === 'confirmed')
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">
                                Confirmada
                            </span>
                        @else
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-bold">
                                Cancelada
                            </span>
                        @endif

                    </div>

                </div>

            @empty

                <div class="p-10 text-center text-gray-500">
                    Todavía no existen reservas registradas.
                </div>

            @endforelse

        </div>

        <!-- Tours recientes -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-gray-100">
                <h2 class="text-xl font-bold text-[#354C40]">
                    Tours registrados recientemente
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Resumen de los últimos tours añadidos.
                </p>
            </div>

            @forelse($tours as $tour)

                <div class="px-6 py-5 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-3">

                    <div>
                        <h3 class="font-bold text-[#354C40]">
                            {{ $tour->titulo }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            {{ $tour->categoria->nombre ?? 'Sin categoría' }}
                        </p>

                        <p class="text-sm text-gray-500">
                            Guía: {{ $tour->guia->name ?? 'Sin asignar' }}
                        </p>
                    </div>

                    <div>
                        @if($tour->activo)
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">
                                Activo
                            </span>
                        @else
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">
                                Inactivo
                            </span>
                        @endif
                    </div>

                </div>

            @empty

                <div class="p-10 text-center text-gray-500">
                    Todavía no existen tours registrados.
                </div>

            @endforelse

        </div>

    </section>

</x-layout>
