@extends('layouts.app')
@section('content')
<style>
    .splide__slide img {
    width: 100%;
    height: auto;
  }

  /* Thumbnail Curosel  */

  .splide {
    margin: 0 auto;
  }

  .thumbnails {
    display: flex;
    margin: 1rem auto 0;
    padding: 0;
    justify-content: center;
  }

  .thumbnail {
    width: 70px;
    height: 70px;
    border-radius: 10px;
    overflow: hidden;
    list-style: none;
    margin: 0 0.2rem;
    cursor: pointer;
    opacity: 0.3;
  }

  .thumbnail.is-active {
    opacity: 1;
  }

  .thumbnail img {
    width: 100%;
    height: auto;
  }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
@if ($product->publish == 0)
<div class="container mt-3">
    <div class="ibox-img">   
        @if (count($product->images) > 1)
            <section id="main-slider" class="splide" aria-label="My Awesome Gallery">
                <div class="splide__track">
                    <ul class="splide__list">
                    @foreach ($product->images as $image)
                    <li class="splide__slide">
                        <img
                        src="{{$image}}"
                        alt=""
                        class="w-100"
                        />
                    </li>
                    @endforeach
                    </ul>
                </div>
            </section>
            <ul id="thumbnails" class="thumbnails">                
                @foreach ($product->images as $image)
                <li class="thumbnail">
                    <img src="{{$image}}" alt="" />
                </li>
                @endforeach
            </ul>   
        @else 
            <div class="text-center">
                <img src="{{$product->images[0]}}" alt="" class="img-fluid w-50">
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-8">
            <h3 class="my-3"> {{ $product->type  }}</h3>
            <div class="row my-3">
                <div class="col-5 col-md-4"> ပစ္စည်းအမျိုးအမည် </div>
                <div class="col-7 col-md-8"> - {{ $product->name }}</div>
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
@else 
    <div class="container d-flex justify-content-center align-items-center vh-100 flex-column">
        <img src="{{$product->logo}}" alt="" width="100px" height="100px">
        <p class="my-3">{{$product->title }}</p>
        <h3 class="text-danger"> This product is no longer available.</h3>
    </div>
@endif
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
    var splide = new Splide("#main-slider", {
    width: 600,
    height: 300,
    pagination: false,
    cover: true
  });

  var thumbnails = document.getElementsByClassName("thumbnail");
  var current;

  for (var i = 0; i < thumbnails.length; i++) {
    initThumbnail(thumbnails[i], i);
  }

  function initThumbnail(thumbnail, index) {
    thumbnail.addEventListener("click", function () {
      splide.go(index);
    });
  }

  splide.on("mounted move", function () {
    var thumbnail = thumbnails[splide.index];

    if (thumbnail) {
      if (current) {
        current.classList.remove("is-active");
      }

      thumbnail.classList.add("is-active");
      current = thumbnail;
    }
  });

  splide.mount()
</script>
@endsection