@extends('layout.app')
@section('content')
    <div class="container mt-5">
        @foreach ($data as $item)
            <span class="text-danger"> Email: {{ $item->email }} </span>
            <a href="{{ route('delete.admin.comment', $item->id) }}" class="btn btn-sm btn-danger ms-3">Delete</a>
            <p class="mb-5"> Comments: {{ $item->comments }} </p>
        @endforeach
    </div>
@endsection
