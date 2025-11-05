<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Especialidad extends Model
{
    /** @use HasFactory<\Database\Factories\EspecialidadFactory> */
    use HasFactory;
    
    
    protected $table = 'especialidades';

    protected $fillable = [
        "codigo",
        "nombre",
    ];

    public function competidores(): HasMany {
        return $this->hasMany(Competidor::class);
    }

    public function expertos(): HasMany {
        return $this->hasMany(User::class);
    }
}
