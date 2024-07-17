<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;




class formule extends Model
{
    use HasFactory;
    protected $fillable = ['nom_formule', 'Montant'];



    public function reservations(): belongsToMany
    {
        return $this->belongsToMany(reservation::class);
    }

    public function evenements(): HasMany
    {
        return $this->hasMany(evenements::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

  


}
