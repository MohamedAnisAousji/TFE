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


}
