<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_paiement',
        'montant_paiement',
        'client_id',
    ];

    public function resrvations(): HasOne
    {
        return $this->hasOne(reservation::class);
    }


    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
