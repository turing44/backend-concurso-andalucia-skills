<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Competidor extends Model
{
    /** @use HasFactory<\Database\Factories\CompetidorFactory> */
    use HasFactory;

    protected $table = 'competidores';

    protected $fillable = [
        "nombre",
        "centro",
        "especialidad_id",
    ];

    public function especialidad(): BelongsTo {
        return $this->belongsTo(Especialidad::class);
    }

    public function puntuacion(): HasOne {
        return $this->hasOne(Puntuacion::class);
    }
}
