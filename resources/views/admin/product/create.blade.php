@extends('layouts.app')
@section('content')
@php
    $types = ['alpha', 'beta', 'gamma', 'delta', 'fox']
@endphp
   <div class="container">
    <h3 class="text-center">
        Create Vehicles 
    </h3>
        <form action="{{ route('productStore') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> Name </label>
                <input type="text" name="name" class="form-control" id="" placeholder="Enter vehicle name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> Type </label>
                <select name="type" id="" class="form-control">
                    @foreach ($types as $item)
                        <option value="{{ $item }}"> {{ $item }} </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-secondary"> Save </button>
        </form>
   </div>
@endsection