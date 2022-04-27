<style>
    img {
        width: 70%
    }

</style>
@extends('layout.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <img src="{{ asset('images/' . $data->image) }}" alt="">
            </div>
            <div class="col-8">
                <p>Title: {{ $data->title }}</p>
                <p>Description: {{ $data->description }}</p>
                <p>Price: {{ $data->price }}</p>
                <a href="" class="btn btn-primary">Add to cart</a>
            </div>
        </div>
    </div>
@endsection
