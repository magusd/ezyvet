<?php

namespace EzyVet\Controllers;

use Illuminate\Http\Request;

class ProductsController extends BaseController
{
    protected $products;

    public function __construct()
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
        $this->products = array_map(function ($product) {
            $product['id'] = md5($product['name']);
            return $product;
        }, $products);
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        return views('products/index', ['products' => $this->products]);
    }

    public function store(Request $request)
    {
        return $request->all();
    }
}