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
    protected $fillable = [
        'date',
        'heure',
        'created_at',
        'deleted_at',
        'client_id',
        'formule_id'
    ];



    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function formule()
    {
        return $this->belongsTo(Formule::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }


}
