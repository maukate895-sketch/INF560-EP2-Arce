<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'guia_id',
        'titulo',
        'slug',
        'descripcion',
        'precio',
        'duracion_horas',
        'cupo_maximo',
        'fecha_salida',
        'imagen',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'precio' => 'decimal:2',
            'fecha_salida' => 'date',
            'activo' => 'boolean',
        ];
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function guia(): BelongsTo
    {
        return $this->belongsTo(User::class, 'guia_id');
    }

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class);
    }

    public function reservas(): HasMany
    {
        return $this->hasMany(Reserva::class);
    }

    public function getCuposDisponiblesAttribute(): int
    {
        $ocupados = $this->reservas()
            ->whereIn('estado', ['pending', 'confirmed'])
            ->sum('cantidad_personas');

        return max(0, $this->cupo_maximo - $ocupados);
    }

    public function scopeActivos(Builder $query): Builder
    {
        return $query->where('activo', true)
            ->whereDate('fecha_salida', '>=', now()->toDateString());
    }
}