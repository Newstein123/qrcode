<div class="visible-print text-center">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(500)->merge(public_path('fire.png'), 0.3, true)->generate('Make me into an QrCode!')) !!} ">
    <p>Scan me to return to the original page.</p>
</div>