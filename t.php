<?php

// $var = true;
// $var = 1;

$var = false;
// $var = 0;
var_dump($var);
if ( $var ) {
    echo 'var = true <br />';
}

if ( $var === true ) {
    echo 'var is a boolean and = true';
}

if ( !$var ) {
    echo 'var = false <br />';
}

if ( $var === false ) {
    echo 'var is a boolean and = false';
}