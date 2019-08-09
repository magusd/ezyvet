<?php
namespace EzyVet\Controllers;

class CartController
{

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        // ######## please do not alter the following code ########
        $products = [
            ["name" => "Sledgehammer", "price" => 125.75],
            ["name" => "Axe", "price" => 190.50],
            ["name" => "Bandsaw", "price" => 562.131],
            ["name" => "Chisel", "price" => 12.9],
            ["name" => "Hacksaw", "price" => 18.45],
        ];
// ########################################################
        return views('cart/index', ['name' => 'Jonathan']);
//        return 'ok';
    }
}