<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom_cli",
        "tel_cli",
        "logement_id"
    ];

    public function logement() {
        $this->belongsTo(Logement::class);
    }
}
