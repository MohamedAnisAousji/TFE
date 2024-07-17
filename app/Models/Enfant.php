<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enfant extends Model
{
    use HasFactory;


    protected $fillable = [
        'Nom_enfant',
        'Prenom_enfant',
        'Date_Naissance',
        'client_id',
    ];


    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }


   
}
