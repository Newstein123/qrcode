@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <h3 class="text-center"> Products Gallery </h3>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 my-3">
                    <div class="card">
                        <div class="card-header">
                            {{ $product->name }}
                        </div>
                        <div class="card-body">
                            <div class="card-img">
                                <img src="{{$product->image}}" alt="" class="img-fluid w-100">
                            </div>
                            <p> <span class="fw-bold"> Type </span> : {{ $product->type}} </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('productView', $product->qr_name) }}" class="btn btn-secondary"> View Product  </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$products->links() }}  
    </div>
@endsection