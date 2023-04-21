<?php

use App\Models\Design;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
            $designs = Design::limit(5)->get();
            return view('template.res_contactless', compact('designs'));
        case $name == 'res_social_media':
            $designs = Design::limit(5)->get();
            return view('template.res_social', compact('designs'));
        default:
            return false;
    }

}


function storeQrInfo($name, array $info) {
    switch ($name) {
        case $name == 'res_contactless_menu':
            return view('template.res_contactless');
        case $name == 'res_social_media':
            return view('template.res_social');
        default:
            return false;
    }
}

function getDefaultDesignColor() {
   $designs =  Design::limit(5)->get();
   return $designs;
}

function hexaToRGB($color) {
    $rgbColor = sscanf($color, "#%02x%02x%02x"); 
    return $rgbColor; 
}

// function storeQrImgae($path)
// {
//     $qr_img = QrCode::format('png')->size(400)->generate();
//     $qr_filename = time(). '_'.$product_id.'.png';
//     Storage::disk('public')->put($directory.$qr_filename, $qr_img);
//     return $qr_filename;
// }
