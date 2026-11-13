<?php
namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function create(Tour $tour)
    {
        $tour->load(['categoria', 'servicios', 'guia']);

        return view('reservas.create', compact('tour'));
    }

    public function store(Request $request, Tour $tour)
    {
        $datos = $request->validate([
            'cantidad_personas' => 'required|integer|min:1|max:10',
            'observacion' => 'nullable|string|max:500',
        ]);

        if (!$tour->activo || $tour->fecha_salida < now()->toDateString()) {
            return back()->withErrors([
                'tour' => 'Este tour ya no está disponible para reservar.',
            ]);
        }

        $reservados = Reserva::where('tour_id', $tour->id)
            ->whereIn('estado', ['pending', 'confirmed'])
            ->sum('cantidad_personas');

        $disponibles = $tour->cupo_maximo - $reservados;

        if ($datos['cantidad_personas'] > $disponibles) {
            return back()->withErrors([
                'cantidad_personas' => 'No hay suficientes cupos disponibles.',
            ])->withInput();
        }

        Reserva::create([
            'user_id' => Auth::id(),
            'tour_id' => $tour->id,
            'cantidad_personas' => $datos['cantidad_personas'],
            'estado' => 'pending',
            'observacion' => $datos['observacion'] ?? null,
        ]);

        return redirect()->route('tours.show', $tour->slug)
            ->with('success', '¡Tu reserva se registró correctamente!');
    }

    // Mostrar las reservas del usuario autenticado
    public function index()
    {
        $reservas = Reserva::with('tour.categoria')
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('reservas.index', compact('reservas'));
    }

    // Cancelar una reserva pendiente
    public function cancelar(Reserva $reserva)
    {
        // Comprobar que la reserva pertenece al usuario
        if ($reserva->user_id !== Auth::id()) {
            abort(403);
        }

        // Solo se pueden cancelar reservas pendientes
        if ($reserva->estado !== 'pending') {
            return back()->withErrors([
                'reserva' => 'Solo puedes cancelar reservas pendientes.',
            ]);
        }

        $reserva->update([
            'estado' => 'cancelled',
        ]);

        return redirect()->route('reservas.index')
            ->with('success', 'Tu reserva fue cancelada correctamente.');
    }

}