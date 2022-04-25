@extends('layout.app')
@section('content')
    <div class="container">
        <h1>Admin page</h1>
        <a href="{{ route('get.admin.create') }}">Create listing</a>
        @forelse ($data as $item)
            <div>
                <img src="{{ asset('images/' . $item->image) }}" alt="">
                <button class="btn btn-sm btn-info">Update</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </div>
        @empty
            <p>
                No items yet
            </p>
        @endforelse
    </div>
@endsection
