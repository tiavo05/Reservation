<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    protected $table = 'rendez-vous';

    protected $fillable = [
        'user_id',
        'date_heure',
        'statut'
    ];

    public function user()
    {
        return
        $this->belongsTo(User::class);
    }
    use HasFactory;
}
