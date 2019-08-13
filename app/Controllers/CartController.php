<?php
namespace EzyVet\Controllers;

class CartController extends BaseController
{

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        return views('cart/index', ['name' => 'Jonathan']);
//        return 'ok';
    }
}