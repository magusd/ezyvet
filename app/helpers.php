<?php

/**
 * @param       $view
 * @param array $data
 *
 * @return mixed
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 */
function views($view,$data = []){
    return App::make('views')->render($view,$data);
}