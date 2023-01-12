<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'status',
    ];

    //1 evento pertenece a 1 turno
    public function shift(){
        return $this->hasOne('App\Models\Shift');
    }
}
