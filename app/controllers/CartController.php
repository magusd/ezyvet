<?php
namespace EzyVet\Controllers;


class CartController
{
    public function index()
    {
        return views('cart/index', ['name' => 'Jonathan']);
//        return 'ok';
    }
}