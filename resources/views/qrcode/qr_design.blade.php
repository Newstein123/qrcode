@php
    list($rc, $gc, $bc) = $code_color;
    list($rbg, $gbg, $bbg) = $code_bg_color;
@endphp

@if($frame != '' && $filename != '')
    <div class="text-center">
        <div class="qr-frame-box rounded" style="width : 220px; height : 230px; border : 5px solid {{$frame}}">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::style($style ?? 'dot')
                ->eye($eye ?? 'square')
                ->color($rc, $gc, $bc)
                ->backgroundColor($rbg, $gbg, $bbg)
                ->format('png')
                ->merge('/public/qr-image/'.$filename)
                ->size(200)->generate('this is qr_code')) !!}"
                style="width : 200px; height : 200px" class="mt-2"
                > 
        </div>
        <div class="qr-frame-text text-center text-white rounded py-3" style="width : 220px; background-color : {{$frame}};">
            <h3> Scan Me </h3>
        </div>
    </div>
@elseif($frame != '')
    <div class="text-center">
        <div class="qr-frame-box rounded" style="width : 220px; height : 230px; border : 5px solid {{$frame}}">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::style($style ?? 'dot')
                ->eye($eye ?? 'square')
                ->color($rc, $gc, $bc)
                ->backgroundColor($rbg, $gbg, $bbg)
                ->format('png')
                ->size(200)->generate('this is qr_code')) !!}"
                style="width : 200px; height : 200px" class="mt-2"
                > 
        </div>
        <div class="qr-frame-text text-center text-white rounded py-3" style="width : 220px; background-color : {{$frame}};">
            <h3> Scan Me </h3>
        </div>
    </div>
@elseif($filename != '')   
<div class="text-center">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::style($style ?? 'dot')
        ->eye($eye ?? 'square')
        ->color($rc, $gc, $bc)
        ->backgroundColor($rbg, $gbg, $bbg)
        ->format('png')
        ->merge('/public/qr-image/'.$filename)
        ->size(200)->generate('this is qr_code')) !!} "> 
</div>
@else
    <div class="text-center">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::style($style ?? 'dot')
            ->eye($eye ?? 'square')->color($rc, $gc, $bc)->backgroundColor($rbg, $gbg, $bbg)
            ->format('png')->size(200)->generate('this is qr_code')) !!} "> 
    </div>
@endif
