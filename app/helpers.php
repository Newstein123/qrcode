<?php

use App\Models\Design;

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.-&$@';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
} 

function getTemplate($name) {
    switch ($name) {
        case $name == 'res_contactless_menu':
            $designs = Design::all();
            return view('template.res_contactless', compact('designs'));
            break;
        case 2:
            echo "The value is 2";
            break;
        case 3:
            echo "The value is 3";
            break;
        default:
            echo "The value is not 1, 2, or 3";
    }

}