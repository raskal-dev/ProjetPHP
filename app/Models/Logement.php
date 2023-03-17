<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Logement extends Model
{
    use HasFactory;

    protected $fillable = [
        "num_logement",
        "type_vente",
        "prix_logement",
        "terrain_id"
    ];

    public function terrain() {
        return $this->belongsTo(Terrain::class);
    }
}
