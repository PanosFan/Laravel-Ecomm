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
                <form method="POST" action="{{ route('post.login') }}">
                    @csrf
                    <div class="mb-3 text-black">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 text-black">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                        <p class="pt-3 lead text-center">
                            Not a member?
                            <a href="{{ route('get.register') }}" class="text-danger fst-italic text-decoration-none">Sign
                                up </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
