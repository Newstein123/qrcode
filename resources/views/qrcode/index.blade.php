@extends('layouts.app')
@section('content')
@include('qrcode.edit')
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
                            <button type="button" class="btn btn-primary w-25 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" id="edit_design" >
                                Edit
                            </button>
                        </div>                   
                    </div>
                </div>
            @endforeach
        </div>
   </div>
@endsection