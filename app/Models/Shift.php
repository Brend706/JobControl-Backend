<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_time',
        'end_time',
    ];

    //1 a muchos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //1 turno tiene muchos eventos (de 1 a muchos)
    public function events(){
        return $this->hasMany('App\Models\Event');
    }
}
