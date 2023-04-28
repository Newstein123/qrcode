@extends('layouts.app')
@section('content')
<style>
  .nav-link {
    color : #000;
  }

  .active {
    color : #e02b20;
    border-left: 5px solid #e02b20;
  }

</style>
    <div class="container my-3">
      <div class="row">
        <div class="col-md-3">
          <ul class="nav flex-column">
            <li class="nav-item"> 
                <a href="/product" class="nav-link {{ request()->is('product*') && !request()->has('category') ? 'active' : '' }}"> Alll </a>
            </li>    
            @foreach ($categories as $category)
            {{-- @php
                if(request()->has('category') && request('category') == $category['id']) {
                  dd('active');
                } else {
                  dd('not active ');
                }
            @endphp --}}
                    <li class="nav-item">
                        <a href="/product?category={{$category['id']}}" class="nav-link  {{ request()->has('category') && request('category') == $category['id'] ? 'active' : ''}} "> {{ $category['name'] }} </a>
                    </li>
            @endforeach
          </ul>
        </div>
        <div class="col-md-9">
        <div class="row">
            @if (count($products) > 0)
            @foreach ($products as $product)
              <div class="col-md-4">
                  <div class="card my-2">
                      <img class="card-img-top" src="{{$product->image}}"
                          alt="Card image cap">
                      <div class="card-body" style="min-height: 200px;">
                          <h5 class="card-title"> {{$product->name}}</h5>
                          <p class="card-text"> {{$product->type}} </p> 
                          <a href="{{route('productDetail', $product->id)}}"
                              class="btn btn-secondary btn-sm"> More Detail </a>
                      </div>
                  </div>
              </div>
            @endforeach
            @else 
                <div class="col-md-12 justify-content-center align-items-center">
                    <h3 class="text-danger">
                        No Data 
                    </h3>
                </div>
            @endif
        <div class="col-md-12 mt-3">
          {{  $paginator->links('products.paginationui') }}
        </div>
        </div>
        </div>
      </div>
    </div>
@endsection