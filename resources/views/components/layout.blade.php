
@props(['title' => 'TuriPotosí'])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F3F0E8] text-[#354C40]">

    <header class="bg-[#536B59] text-white shadow-md">
        <nav class="max-w-7xl mx-auto px-6 py-5 flex flex-wrap justify-between items-center gap-4">

            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-wide">
                TuriPotosí
            </a>

            <div class="flex flex-wrap items-center gap-5 font-semibold">

                <a href="{{ route('home') }}" class="hover:text-[#D8C39A] transition">
                    Inicio
                </a>

                <a href="{{ route('tours.index') }}" class="hover:text-[#D8C39A] transition">
                    Tours
                </a>

                @guest
                    <a href="{{ route('login') }}"
                       class="hover:text-[#D8C39A] transition">
                        Iniciar sesión
                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-[#D8C39A] text-[#354C40] px-5 py-2 rounded-lg hover:bg-white transition">
                        Registrarse
                    </a>
                @endguest

                @auth
    <a href="{{ route('reservas.index') }}"
       class="hover:text-[#D8C39A] transition">
        Mis reservas
    </a>

    <span class="text-[#E4E8DF]">
        Hola, {{ Auth::user()->name }}
    </span>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit"
                class="bg-[#D8C39A] text-[#354C40] px-5 py-2 rounded-lg hover:bg-white transition font-bold">
            Cerrar sesión
        </button>
    </form>
@endauth

            </div>
        </nav>
    </header>

    <main class="min-h-screen">
        <x-flash />
        {{ $slot }}
    </main>

    <footer style="background-color: #354C40; color: #FFFFFF; display: block; width: 100%; margin-top: 48px;">
        <div style="max-width: 1280px; margin: auto; padding: 40px 24px; text-align: center;">

            <h2 class="text-2xl font-bold">
                TuriPotosí
            </h2>

            <p class="text-[#E4E8DF] mt-3">
                Descubre la historia, cultura y naturaleza de Potosí.
            </p>

            <div class="border-t border-[#718575] mt-8 pt-5">
                <p class="text-white text-sm">
                    © 2026 TuriPotosí. Todos los derechos reservados.
                </p>
            </div>

        </div>
    </footer>

</body>
</html>
