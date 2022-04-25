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
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 text-black">
                        <label for="name" class="form-label">Author name</label>
                        <input name="name" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 text-black">
                        <label for="bio" class="form-label">Bio</label>
                        <input name="bio" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 text-black">
                        <label for="image" class="form-label">Image</label>
                        <input name="image" type="file" class="form-control" required>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
