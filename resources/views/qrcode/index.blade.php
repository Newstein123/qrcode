@extends('layouts.app')
@section('content')
   <div class="container">
        <div class="row">
            @foreach ($qr_codes as $qr_code)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Your QR
                            </div> 
                        </div>
                        <div class="card-body">
                            Your QR Body 
                        </div>
                        <div class="card-footer">
                            <a href="{{route('viewQr', $qr_code->id)}}" class="btn btn-danger btn-sm"> View QR </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
   </div>
@endsection