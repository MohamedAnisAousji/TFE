<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enfant extends Model
{
    use HasFactory;


    protected $fillable = [
        'date_Nais',
        'nom_enfant',
        'prenom_Enfant',
        'client_id'

    ];

    protected $table = 'enfants';

    // Si ton champ s'appelle date_Nais dans la BDD :
    protected $dates = ['date_Nais'];




    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }





   
}
