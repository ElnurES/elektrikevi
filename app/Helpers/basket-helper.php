<?php

use Gloudemans\Shoppingcart\Facades\Cart;

function basketItem()
    {
        $basketItem=[];
        foreach (Cart::content() as $cart) {
            array_push($basketItem,$cart->id);
        }

        return $basketItem;
    }