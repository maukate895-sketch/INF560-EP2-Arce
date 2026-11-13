
<x-layout title="Iniciar sesión | TuriPotosí">

    <section class="min-h-screen bg-[#F5F3EC] flex items-center justify-center px-4 py-12">

        <div class="w-full max-w-lg bg-white rounded-3xl shadow-xl overflow-hidden">

            <div class="bg-[#354C40] text-white text-center p-8">

                <div class="text-4xl mb-3">🏔️</div>

                <p class="text-[#D8C39A] uppercase tracking-widest text-sm font-semibold">
                    TuriPotosí
                </p>

                <h1 class="text-3xl font-bold mt-2">
                    Bienvenido de nuevo
                </h1>

                <p class="text-gray-200 mt-2">
                    Ingresa a tu cuenta y continúa explorando.
                </p>

            </div>

            <div class="p-7 md:p-9">

                @if ($errors->any())
                    <div class="bg-red-50 text-red-700 border border-red-200 rounded-xl p-4 mb-5">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login.store') }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label for="email" class="block text-[#354C40] font-bold mb-2">
                            Correo electrónico
                        </label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="ejemplo@correo.com"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#536B59] focus:outline-none"
                        >
                    </div>

                    <div class="mb-7">
                        <label for="password" class="block text-[#354C40] font-bold mb-2">
                            Contraseña
                        </label>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            required
                            placeholder="Escribe tu contraseña"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#536B59] focus:outline-none"
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-[#354C40] hover:bg-[#536B59] text-white font-bold py-4 rounded-xl shadow-md transition duration-300"
                    >
                        Iniciar sesión →
                    </button>

                </form>

                <p class="text-center text-gray-600 mt-6">
                    ¿Todavía no tienes una cuenta?
                    <a href="{{ route('register') }}" class="text-[#536B59] font-bold hover:underline">
                        Regístrate aquí
                    </a>
                </p>

            </div>

        </div>

    </section>

</x-layout>
