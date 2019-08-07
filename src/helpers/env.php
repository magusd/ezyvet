<?php

function env($var,$default = null){
    return getenv($var)?:$default;
}
