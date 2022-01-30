<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table='order';
    protected $guarded=[];
    public $timestamps=true;

    public function basket()
    {
        return $this->belongsTo('App\Models\Basket','basket_id');
    }

    public function order_created_at_no_pm()
    {
        $date=\Carbon\Carbon::parse($this->created_at);
        return $date->isoFormat('MMM D YYYY');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region','region_id');
    }

    public function street()
    {
        return $this->belongsTo('App\Models\Street','street_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status','status_id');
    }
}
