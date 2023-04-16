<div class="text-center">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::style($style ?? 'dot')
        ->eye($eye ?? 'square')
        ->format('png')->size(200)->generate('this is qr_code')) !!} "> 
</div>