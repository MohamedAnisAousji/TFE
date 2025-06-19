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
        'nom_parent',
        'prenom_parent',
        'genre_parent',
        'email',
        'mot_de_passe',
        'envoi_mail',
        'type_client',
    ];


     public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function enfants()
    {
        return $this->hasMany(Enfant::class);
    }

    public function evenements()
    {
        return $this->hasMany(evenements::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }


 

}
