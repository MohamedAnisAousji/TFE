<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class evenements extends Model
{
    use HasFactory;

    protected $fillable = ['date_debut', 'date_fin', 'capacite', 'status', 'nom_societe', 'email', 'formule_demande'];




    public function reservations(): HasMany
    {
        return $this->hasMany(reservation::class);
    }
    
    public function formule(): BelongsTo
    {
        return $this->belongsTo(formule::class);
    }


    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

}
