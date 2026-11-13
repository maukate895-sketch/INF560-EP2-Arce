<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Reserva;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalTours = Tour::count();
        $totalReservas = Reserva::count();
        $totalUsuarios = User::count();

        $reservasPendientes = Reserva::where('estado', 'pending')->count();

        $ultimasReservas = Reserva::with(['user', 'tour'])
            ->latest()
            ->take(5)
            ->get();

        $tours = Tour::with(['categoria', 'guia'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.index', compact(
            'totalTours',
            'totalReservas',
            'totalUsuarios',
            'reservasPendientes',
            'ultimasReservas',
            'tours'
        ));
    }
}