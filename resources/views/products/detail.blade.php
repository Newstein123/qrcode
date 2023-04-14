@extends('layouts.app')
@section('content')
    @if($product->publish == 0)
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    {{ $product->name }}
                </div>
                <div class="card-body">
                    <div class="card-img">
                        @foreach ($product->images as $image)
                            <img src="{{$image}}" alt="" class="img-fluid w-100">
                        @endforeach
                    </div>
                    <p> <span class="fw-bold"> အမျိုးအစား </span> : {{ $product->type }} </p>
                    <p> <span class="fw-bold"> Model No </span> : {{ $product->model_no }} </p>
                    <p> <span class="fw-bold"> ထုတ်လုပ်သည့်တိုင်းပြည် </span> : {{ $product->country }} </p>
                    <p> <span class="fw-bold"> စတင်အသုံးပြုသည့်ရက်စွဲ </span> : {{ $product->start_date }} </p>
                    <p> <span class="fw-bold"> ထုတ်လုပ်သည့်ခုနှစ်  </span> : {{ $product->manufactured_year}} </p>   
                    <p> <span class="fw-bold"> Usage </span> : {{ $product->usage }}  </p>
                    <p> <span class="fw-bold"> Detail </span> : {{ $product->detail }} </p>
                    <p class="text-center"> Scan This Qr Code </p>
                    <div class="visible-print text-center">
                        @if ($product->qr_img != '')
                            <img src="{{$product->qr_img}}" alt="" class="w-25 img-fluid">
                        @endif
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