<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table='subscribe';
    protected $guarded=[];
    public $timestamps=false;

    public function subscribe_created_at()
    {
        $date=\Carbon\Carbon::parse($this->created_at);
        return $date->isoFormat('MMM D YYYY');
    }
}
