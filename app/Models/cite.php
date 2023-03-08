<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cite extends Model
{
    use HasFactory;

    protected $fillable = [
        "libelle_cite",
        "adresse_cite",
        "code_postal_cite",
        "agence_id"
    ];
}
