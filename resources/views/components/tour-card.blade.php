
@props(['tour'])

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

<article class="group bg-white rounded-2xl overflow-hidden shadow-md border border-[#E4E8DF] hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">

    <a href="{{ route('tours.show', $tour->slug) }}"
       class="block relative h-64 overflow-hidden">

        <img
            src="{{ $imagen }}"
            alt="{{ $tour->titulo }}"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
            loading="lazy"
        >

        <div class="absolute inset-0 bg-gradient-to-t from-[#17291f]/70 via-transparent to-transparent"></div>

        <span class="absolute bottom-4 left-5 text-white text-sm font-semibold">
            {{ $tour->categoria->nombre }}
        </span>
    </a>

    <div class="p-5 text-center">

        <h2 class="text-xl font-bold text-[#354C40] min-h-[56px] flex items-center justify-center">
            {{ $tour->titulo }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
            {{ \Illuminate\Support\Str::limit($tour->descripcion, 100) }}
        </p>

        <a
            href="{{ route('tours.show', $tour->slug) }}"
            class="mt-4 inline-flex items-center justify-center gap-3 w-full bg-[#354C40] hover:bg-[#536B59] text-white px-5 py-3 rounded-xl font-bold transition-all duration-300"
        >
            Ver detalles
            <span>&rarr;</span>
        </a>

    </div>

</article>
