@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('post.contact') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="comments" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 200px"></textarea>
                        <label for="floatingTextarea2">Comments</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
