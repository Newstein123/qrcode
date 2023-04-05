@extends('layouts.app')
@section('content')
    @if($product->status == 0)
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    {{ $product->name }}
                </div>
                <div class="card-body">
                    <p> <span class="fw-bold"> Type </span> : {{ $product->type }} </p>
                    <p> <span class="fw-bold"> Model No </span> : {{ $product->model_no }} </p>
                    <p> <span class="fw-bold"> Country </span> : {{ $product->country }} </p>
                    <p> <span class="fw-bold"> Export Date </span> : {{ $product->country }} </p>
                    <p> <span class="fw-bold"> Usage </span> : {{ $product->usage }}  </p>
                    <p> <span class="fw-bold"> Description </span> : {{ $product->description }} </p>
                    <p class="text-center"> Scan This Qr Code </p>
                    <div class="visible-print text-center">
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->merge(public_path('fsd-qr-img.jpg'), 0.2, true)->generate(url('/product/'.$product->id))) !!} ">
                    </div>
                    <div class="card-footer my-2">
                        <form action="{{route('qrDownload', $product->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-secondary"> Download </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>     
    @else 
        <div class="bg-secondary text-white d-flex align-items-center vh-100 justify-content-center">
            <div class="text-center">
                <h3> Your QR Code is expired </h3>
                <p> Upgrade Your Plan</p>
            </div>
        </div>
    @endif
@endsection