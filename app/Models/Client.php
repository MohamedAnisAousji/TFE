<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Laravel\Cashier\Billable;




class Client extends Model implements AuthenticatableContract
{
    use Billable;
    
    use HasFactory,Authenticatable;
    protected $fillable = [
        'Nom_Parent', 
        'Prenom_Parent', 
        'Genre', 
        'Email', 
        'Envoi_Email', 
        'password', 
        'Actif'
    ];
    
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
    public function commentaires(): HasMany
    {
        return $this->hasMany(commentaire::class);
    }

    public function enfants(): HasMany
    {
        return $this->hasMany(Enfant::class);
    }


    public function formules(): HasMany
    {
        return $this->hasMany(formule::class);
    }


    public function paiement(): HasMany
    {
        return $this->hasMany(paiement::class);
    }

    public function evenements(): HasMany
    {
        return $this->hasMany(evenements::class);
    }


 

}
