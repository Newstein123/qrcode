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
            {{-- Main Box  --}}
            <div id="main_box">
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
                <button id="next" class="btn btn-primary btn-sm"  disabled> Next </button>
            </div>
            {{-- Template Box  --}}
            <div id="template_box">
                
            </div>
        </div>
    </div>
@endsection