@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="w-50" style="background-color: {{$qr_code->design->primary_color}}">
            <p> {{json_decode($qr_code->qr_info)->title}}</p>
        </div>
    </div>
@endsection