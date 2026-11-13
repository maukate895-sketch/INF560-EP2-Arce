<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $consulta = Tour::activos()->with(['categoria', 'guia', 'servicios']);

        if ($request->filled('buscar')) {
            $buscar = trim($request->buscar);

            $consulta->where(function ($query) use ($buscar) {
                $query->where('titulo', 'ILIKE', '%' . $buscar . '%')
                    ->orWhere('descripcion', 'ILIKE', '%' . $buscar . '%');
            });
        }

        if ($request->filled('categoria')) {
            $consulta->whereHas('categoria', function ($query) use ($request) {
                $query->where('slug', $request->categoria);
            });
        }

        $tours = $consulta->orderBy('fecha_salida')
            ->paginate(9)->withQueryString();

        $categorias = Categoria::orderBy('nombre')->get();

        return view('tours.index', compact('tours', 'categorias'));
    }

    public function show(Tour $tour)
    {
        $tour->load(['categoria', 'guia', 'servicios']);

        return view('tours.show', compact('tour'));
    }
}