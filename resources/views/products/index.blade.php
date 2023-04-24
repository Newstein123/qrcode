@extends('layouts.app')
@section('content')

            <div class="text-center my-3 p-3 bg-secondary text-white">
                <h3> Product Gallery </h3>
            </div>
            <div class="container">
                <div class="row">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                        <div class="col-md-3">
                            <div class="card my-2">
                                    <img class="card-img-top" src="{{$product->image}}" alt="Card image cap">
                                <div class="card-body">
                                <h5 class="card-title"> {{$product->name}}</h5>
                                <p class="card-text"> {{$product->type}} </p>
                                <a href="{{route('productDetail', $product->id)}}" class="btn btn-secondary btn-sm"> More Detail </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else 
                        <div class="text-center text-danger"> There is no data </div>
                    @endif
                </div>
                {{$paginator->links()}}
            </div>
@endsection