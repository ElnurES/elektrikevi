<?php

use Illuminate\Support\Facades\DB;

function star($id)
{

    $star=DB::select('SELECT SUM(star) AS star,count(*) as count FROM product_star WHERE product_id=?',[$id]);


    if($star[0]->star!='') {
        $a= ceil($star[0]->star/$star[0]->count);
        return [
            'star'=>$a,
            'count'=>$star[0]->count
        ];
    } else {
        return [
            'star'=>0,
            'count'=>0
        ];
    }

}
