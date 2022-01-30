<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPhoto extends Model
{
    use SoftDeletes;
    protected $table='product_photo';
    protected $guarded=[];
    public $timestamps=false;
}
