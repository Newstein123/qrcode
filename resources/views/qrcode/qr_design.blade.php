@php
    list($rc, $gc, $bc) = $code_color;
    list($rbg, $gbg, $bbg) = $code_bg_color;
@endphp

<div class="text-center">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::style($style ?? 'dot')
        ->eye($eye ?? 'square')->color($rc, $gc, $bc)->backgroundColor($rbg, $gbg, $bbg)
        ->format('png')->size(200)->generate('this is qr_code')) !!} "> 
</div>