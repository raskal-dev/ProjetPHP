<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cite extends Model
{
    use HasFactory;

    protected $fillable = [
        "libelle_cite",
        "adresse_cite",
        "code_postal_cite",
        "agence_id"
    ];

    public function agence() {
        return $this->belongsTo(Agence::class);
    }
}
