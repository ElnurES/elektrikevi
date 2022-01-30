<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
    use SoftDeletes;
    protected $table='category';
    protected $guarded=[];
    public $timestamps=true;

    public function child()
    {
        return $this->hasMany('App\Models\Category','parent_id');
    }

    public function product()
    {
        return $this->belongsToMany('App\Models\Product','category_product','category_id','product_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category','parent_id');
    }

    public function parentWithDefault()
    {
        return $this->belongsTo('App\Models\Category','parent_id')->withDefault([
            'name'=>'Ana Kategoriya'
        ]);
    }

    public static function domain()
    {
        $domain=Session::get('domain');
        return Category::where('domain',$domain);

    }

    public function categoryDomain()
    {
        return $this->belongsTo('App\Models\Domains','domain');
    }

    public function category_updated_at_no_pm()
    {
        $date=\Carbon\Carbon::parse($this->updated_at);
        return $date->isoFormat('MMM D YYYY');
    }
}
