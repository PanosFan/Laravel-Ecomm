<style>
    img {
        width: 40%
    }

</style>

@extends('layout.app')
@section('content')
    <div class="container">
        <div class="container">
            <h3>Books</h3>
            <div class="row mt-4">
                @forelse ($data as $item)
                    <div class="col-6 text-center p-4">
                        <img src="{{ asset('images/' . $item->image) }}" alt="">
                        <div>Title: {{ $item->title }}</div>
                        <div>Author: {{ $item->author }}</div>
                        <div>Price: {{ $item->price }}&euro;</div>
                        <a href="#" class="btn btn-primary">Buy</a>
                        <a href="{{ route('get.book.details', $item->id) }}" class="btn btn-info">Details</a>
                    </div>
                @empty
                    <p>
                        No items yet
                    </p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
