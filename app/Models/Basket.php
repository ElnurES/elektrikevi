<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Basket extends Model
{
    use SoftDeletes;
    protected $table='basket';
    public $timestamps=true;
    protected $guarded=[];

    public static function active_basket_id()
    {
        $basket=DB::table('basket as b')
        ->leftJoin('order as o','o.basket_id','=','b.id' )
        ->where('b.user_id',auth()->id())
        ->whereRaw('o.id is null')
        ->orderByDesc('b.created_at')
        ->select('b.id')
        ->first();
        if(!is_null($basket)) {
            return $basket->id;
        }
    }

    public function basket_products()
    {
        return $this->hasMany('App\Models\BasketProduct','basket_id');
    }
}
