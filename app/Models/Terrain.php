<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    protected $fillable = [
        "superficie_terrain",
        "nom_terrain",
        "cite_id"
    ];

    public function cite() {
        return $this->belongsTo(Cite::class);
    }
}
