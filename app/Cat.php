<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table = 'cats';
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
