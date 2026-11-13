
<x-layout title="Reservar tour | TuriPotosí">

    <section class="min-h-screen bg-[#F5F3EC] py-12 px-4">

        <div class="max-w-3xl mx-auto">

            <a href="{{ route('tours.show', $tour->slug) }}"
               class="inline-flex items-center gap-2 text-[#536B59] font-semibold mb-6 hover:underline">
                ← Volver al destino
            </a>

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

                <div class="bg-[#354C40] text-white p-8">
                    <p class="text-[#D8C39A] uppercase tracking-widest text-sm font-semibold">
                        TuriPotosí
                    </p>

                    <h1 class="text-3xl font-bold mt-2">
                        Reserva tu experiencia
                    </h1>

                    <p class="text-gray-200 mt-2">
                        Estás a un paso de descubrir Potosí.
                    </p>
                </div>

                <div class="p-6 md:p-8">

                    <div class="bg-[#F5F3EC] rounded-2xl p-5 mb-7">
                        <p class="text-sm text-[#8B7655] font-semibold uppercase">
                            Destino seleccionado
                        </p>

                        <h2 class="text-2xl font-bold text-[#354C40] mt-1">
                            {{ $tour->titulo }}
                        </h2>

                        <p class="text-gray-600 mt-2">
                            {{ \Illuminate\Support\Str::limit($tour->descripcion, 150) }}
                        </p>

                        <div class="flex flex-wrap gap-5 mt-4 text-sm text-gray-700">
                            <span>💰 Bs. {{ number_format($tour->precio, 2) }} por persona</span>
                            <span>⏱️ {{ $tour->duracion_horas }} horas</span>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6">
                            <p class="font-semibold">Revisa los siguientes datos:</p>
                            <ul class="list-disc ml-5 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('reservas.store', $tour->slug) }}" method="POST">
                        @csrf

                        <div class="mb-6">
                            <label for="cantidad_personas"
                                   class="block font-bold text-[#354C40] mb-2">
                                ¿Cuántas personas asistirán?
                            </label>

                            <input
                                type="number"
                                name="cantidad_personas"
                                id="cantidad_personas"
                                min="1"
                                max="10"
                                value="{{ old('cantidad_personas', 1) }}"
                                required
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#536B59] focus:outline-none"
                            >

                            @error('cantidad_personas')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-7">
                            <label for="observacion"
                                   class="block font-bold text-[#354C40] mb-2">
                                Observaciones (opcional)
                            </label>

                            <textarea
                                name="observacion"
                                id="observacion"
                                rows="4"
                                placeholder="Escribe alguna solicitud especial..."
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#536B59] focus:outline-none"
                            >{{ old('observacion') }}</textarea>
                        </div>

                        <button
                            type="submit"
                            class="w-full bg-[#354C40] hover:bg-[#536B59] text-white font-bold py-4 rounded-xl transition duration-300 shadow-md"
                        >
                            Confirmar mi reserva →
                        </button>

                    </form>

                </div>
            </div>

        </div>

    </section>

</x-layout>
