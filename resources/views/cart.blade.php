@extends('layout.app')
@section('content')
    <div class="container mt-5">
        @forelse ($data as $item)
            <span>Title: {{ $item->title }}</span>
            <p>Price: {{ $item->price }}</p>
        @empty
            <p>No items in cart</p>
        @endforelse
        <a href="{{ route('checkOut') }}" class="btn btn-outline-primary my-3">Checkout</a>
    </div>
@endsection
