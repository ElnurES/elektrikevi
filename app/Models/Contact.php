<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $table='contact';
    protected $guarded=[];
    public $timestamps=true;

    public function contact_created_at()
    {
        $date=\Carbon\Carbon::parse($this->created_at);
        return $date->isoFormat('MMM D YYYY');
    }
}
