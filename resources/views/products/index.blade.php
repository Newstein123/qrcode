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
                            <p> <span class="fw-bold"> Type </span> : {{ $product->type }} </p>
                            <p> <span class="fw-bold"> Model No </span> : {{ $product->model_no }} </p>
                            <p> <span class="fw-bold"> Country </span> : {{ $product->country }} </p>
                            <p> <span class="fw-bold"> Export Date </span> : {{ $product->export_date }} </p>
                            <p> <span class="fw-bold"> Usage </span> : {{ $product->usage }}  </p>
                            <p> <span class="fw-bold"> Description </span> : {{ $product->description }} </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('productView', $product->id) }}" class="btn btn-secondary"> View Product  </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

{{ $products->links() }}
@endsection