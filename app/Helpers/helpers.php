<?php

if(!function_exists("bf_currency")){
    function bf_currency($prix){
        return  number_format($prix, 0, '.', ' ')." FCFA";
    }
}