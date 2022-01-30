<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    use SoftDeletes;
    protected $table='product';
    protected $guarded=[];
    public $timestamps=true;

    public function photo()
    {
        return $this->hasMany('App\Models\ProductPhoto','product_id');
    }

    public function parentPhoto()
    {
        return ProductPhoto::where('product_id',$this->id)->where('parent',1)->first();
    }

    public function childPhoto()
    {
        return ProductPhoto::where('product_id',$this->id)->where('child',1)->first();
    }

    public function checkIsNew()
    {
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $this->created_at);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', now());

        $diff_in_days = $to->diffInDays($from);

        return $diff_in_days;
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Category','category_product','product_id','category_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status','status_id');
    }


    public function setDiscountDate()
    {
       return \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2019-12-25 22:04:34')->format('Y/m/d');
    }

    public static function domain()
    {
        $domain=Session::get('domain');
        return Product::where('domain',$domain);

    }

    public function productDomain()
    {
        return $this->belongsTo('App\Models\Domains','domain');
    }

    public function product_updated_at_no_pm()
    {
        $date=\Carbon\Carbon::parse($this->updated_at);
        return $date->isoFormat('MMM D YYYY');
    }

    public function feature()
    {
        return $this->hasMany('App\Models\Feature','product_id');
    }
}
