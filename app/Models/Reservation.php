<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\belongsToMany;


class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['Date', 'heure_resrv', 'client_id'];



    public function clients(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function commentaires()
    {
        return $this->hasOne(commentaire::class);
    }

    public function evenements(): BelongsTo
    {
        return $this->belongsTo(evenements::class);
    }

    public function formules()
    {
        return $this->belongsToMany(formule::class);
    }

    public function paiements(): HasOne
    {
        return $this->hasOne(paiement::class);
    }

}
