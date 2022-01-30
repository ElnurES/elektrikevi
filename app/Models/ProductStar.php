<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductStar extends Model
{
    use SoftDeletes;
    protected $table='product_star';
    public $timestamps=true;
    protected $guarded=[];
}
