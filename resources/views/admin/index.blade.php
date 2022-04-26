<style>
    img {
        width: 40%
    }

</style>
@extends('layout.app')
@section('content')
    <div class="container">
        <h1 class="text-danger">Admin page</h1>
        <a class="lead" href="{{ route('get.admin.create') }}">Create listing</a>
        <div class="row mt-4">
            @forelse ($data as $item)
                <div class="col-6 text-center p-4">
                    <img src="{{ asset('images/' . $item->image) }}" alt="">
                    <div>Title: {{ $item->title }}</div>
                    <div>Author: {{ $item->author }}</div>
                    <div>Price: {{ $item->price }}&euro;</div>
                    <div>Description: {{ $item->description }}</div>
                    <a href="#" class="btn btn-sm btn-info">Update</a>
                    <a href="{{ route('delete.listing', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </div>
            @empty
                <p>
                    No items yet
                </p>
            @endforelse
        </div>
    </div>
@endsection
