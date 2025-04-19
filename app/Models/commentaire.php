<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'evaluation',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
