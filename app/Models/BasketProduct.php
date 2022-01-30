<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BasketProduct extends Model
{
    use SoftDeletes;
    protected $table='basket_product';
    public $timestamps=true;
    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
