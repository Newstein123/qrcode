@extends('layouts.app')
@section('content')
@php
    $qr_types = [
        'Personal Use',
        'Business Consultant',
        'Resturant and Bars',
        'Website',
        'Instagram Link',
        'Cupon',
        'Socail Media',
        'Business Page',
        'Event',
        'Images',
        'Videos',
        'Vcard',
    ]
@endphp
    <div class="bg-light p-3 rounded">
        <div class="container">
            <form action="">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"> Name </label>
                    <select name="qrcode_type" id="qrcode_type" class="form-control">
                        @foreach ($qr_types as $item)
                            <option value="{{$item}}"> {{$item }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3" id="template">
                </div>
            </form>
        </div>
    </div>
@endsection