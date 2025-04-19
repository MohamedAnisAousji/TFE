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
    protected $fillable = [ 'montant',
    'desc_formules',
    'nom_formule',
];

public function reservations()
{
    return $this->hasMany(Reservation::class);
}

  


}
