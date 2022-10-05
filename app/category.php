<?php

namespace App;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
