<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }

</style>

@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-3 mt-5">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('update.listing', $book->id) }}" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                    <div class="mb-3 text-black">
                        <label for="title" class="form-label">Book Title</label>
                        <input value="{{ $book->title }}" name="title" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 text-black">
                        <label for="author" class="form-label">Author name</label>
                        <input value="{{ $book->author }}" name="author" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 text-black">
                        <label for="description" class="form-label">Description</label>
                        <input value="{{ $book->description }}" name="description" type="text" class="form-control"
                            required>
                    </div>
                    <div class="mb-3 text-black">
                        <label for="price" class="form-label">Price</label>
                        <input value="{{ $book->price }}" name="price" type="number" class="form-control" required>
                    </div>
                    <div class="mb-3 text-black">
                        <label for="image" class="form-label">Image</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="isTrending"
                            @if ($book->isTrending == true) checked @endif>
                        <label class="form-check-label" for="isTrending">
                            Trending?
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
