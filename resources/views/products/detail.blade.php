@extends('layouts.app')
@section('content')
@if($product->publish == 0) 
    <section class="page-design bg-light">
        <div class="container mt-5">
    <div class="ibox-img d-flex justify-content-center align-items-center">  
        @if (count($product->images) > 1)
        <div id="carouselExampleControls" class="carousel slide w-50">
          <div class="carousel-inner">
            @foreach($product->images as $key=>$image)
                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                    <img src="{{$image}}" class="d-block w-100" alt="...">
                </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-danger p-3 rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-danger p-3 rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        @else
            @foreach ($product->images as $image)
                    <img src="{{$image}}" class="d-block" alt="...">
            @endforeach
        @endif
    </div>
    <div class="row">
        <div class="col-md-8">
            <h3 class="my-3"> {{ $product->name  }}</h3>
            <div class="row my-3">
                <div class="col-5 col-md-4"> ပစ္စည်းအမျိုးအစား </div>
                <div class="col-7 col-md-8"> - {{ $product->type }}</div>
            </div>
            @if ($product->company_name) 
                <div class="row my-3">
                    <div class="col-5 col-md-4"> ကုမ္ပဏီအမည် </div>
                    <div class="col-7 col-md-8"> - {{ $product->company_name }} </div>
                </div>
            @endif
            @if ($product->country)
                <div class="row my-3">
                    <div class="col-5 col-md-4"> ထုတ်လုပ်သည့်နိုင်ငံ  </div>
                    <div class="col-7 col-md-8"> - {{ $product->country }} </div>
                </div>
            @endif
            @if ($product->model_no)
                <div class="row my-3">
                    <div class="col-5 col-md-4"> ပစ္စည်းမော်ဒယ်နံပါတ် </div>
                    <div class="col-7 col-md-8"> - {{ $product->model_no }}</div>
                </div>
            @endif
            @if ($product->manufactured_year)
                <div class="row my-3">
                    <div class="col-5 col-md-4"> ထုတ်လုပ်သည့်ခုနှစ် </div>
                    <div class="col-7 col-md-8"> 
                        @php
                            $year = date('Y', strtotime($product->manufactured_year));
                        @endphp
                        - {{$year}}
                    </div>
                </div>
            @endif
            @if ($product->start_date)
                <div class="row my-3">
                    <div class="col-5 col-md-4"> စတင်သုံးစွဲသည့်နေ့စွဲ  </div>
                    <div class="col-7 col-md-8"> - {{$product->start_date}}</div>
                </div>
            @endif
            @if ($product->usage)
                <div>
                    <p class="fw-bold"> အသုံးပြုပုံ </p>
                    <p>{{ $product->usage }}</p>
                </div>
            @endif
            @if ($product->detail)
                <div>
                    <p class="fw-bold"> အသေးစိတ် </p>
                    <p>{{ $product->detail }}</p>
                </div>
            @endif
        </div>
            {{-- QR Code  --}}
        <div class="text-center my-3 col-md-4 mt-5">
            <img src="{{$product->qr_img}}" alt="" class="img-fluid w-50">
        </div>
    </div>     
</div>  
    </section>
@else 
    <div class="mt-5 container d-flex justify-content-center align-items-center flex-column">
        <img src="{{$product->logo}}" alt="" width="100px" height="100px">
        <p class="my-3">{{$product->title }}</p>
        <h3 class="text-danger"> This product is no longer available.</h3>
    </div>
@endif
@endsection