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
        'date',
        'mode_paiement',
        'type_paiement',
        'montant',
        'reservation_id'
    ];



    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
