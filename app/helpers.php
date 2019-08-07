<?php

function views($view,$data = []){
    return App::make('views')->render($view,$data);
}