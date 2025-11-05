<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Puntuacion extends Model
{
    /** @use HasFactory<\Database\Factories\PuntuacionFactory> */
    use HasFactory;

    protected $table = 'especialidades';

    protected $fillable = [
        "puntuacion_1",
        "puntuacion_2",
        "puntuacion_3",
        "puntuacion_4",
        "competidor_id",

    ];

    public function competidor(): BelongsTo{
        return $this->belongsTo(Competidor::class);
    }
}
