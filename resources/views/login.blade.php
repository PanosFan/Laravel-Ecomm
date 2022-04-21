@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-4 mt-5">
                <form action="">
                    <div class="mb-3 text-black">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 text-black">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>

                    <div>
                        <button type="button" class="btn btn-primary">Sign in</button>
                        <p class="pt-3 lead text-center">
                            Not a member?
                            <a href="{{ route('get.register') }}" class="text-danger text-decoration-none">Sign up </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
