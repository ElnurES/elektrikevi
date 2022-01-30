<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table='password_reset';
    protected $guarded=[];
    public $timestamps=false;

    public function user()
    {
        return $this->belongsTo('App\User','email','email');
    }
}
