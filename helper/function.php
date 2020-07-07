<?php
function p($var){

    echo "<pre>";
    print_r($var);
    echo "</pre>";

}

function pd($var){

    echo "<pre>";
    print_r($var);
    echo "</pre>";
    die();

}

function vd($var){
    var_dump($var);
    die();
}