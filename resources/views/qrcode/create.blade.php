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
        <div>
            <a href="{{route('allQr')}}" class="btn btn-secondary btn-sm"> See All QR </a>
        </div>
        <!-- In your Blade view -->
        <img src="data:image/svg+xml;base64,{{ base64_encode($svg_image) }}" alt="QR Code">
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
                <div class="row">
                    <div class="mb-3 col-md-8" id="template">
                    </div>
                    <div class="preview_template col-md-4">
                    </div>
                </div>
                <button id="next" class="btn btn-primary btn-sm"> Next </button>
            </div>
            {{-- Template Box  --}}
            <div id="template_box">          
            </div>
        </div>
    </div>

    <form action="{{route('save_qrcode')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit"> Save </button>
    </form>
@endsection