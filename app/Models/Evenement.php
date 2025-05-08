<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'nombre',
        'status',
        'email',
        'nom_societe',
        'formule_demande',
        'client_id'
    ];







    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

}
