@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <h3 class="text-center">
            Fire Vehicles QR Code 
        </h3>
        <div class="float-left my-3">
            <a href="{{ route('productCreate')}}" class="btn btn-secondary"> Create Product  </a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> Id </th>
                    <th> Name </th>
                    <th> Type </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td> {{ $product->id }}     </td>
                        <td> {{ $product->name }}   </td>
                        <td> {{ $product->type }}   </td>
                        <td>
                            <form action="{{route('qrDownload', $product->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger"> Download QR </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>

@endsection