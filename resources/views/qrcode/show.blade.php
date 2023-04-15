@extends('layouts.app')
@section('content')
    <div class="text-center">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate(url('qr_code/'.$qr_code->qr_name))) !!} ">
    </div>
@endsection