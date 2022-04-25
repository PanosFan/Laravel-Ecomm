@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-3 mt-5">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('post.register') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" aria-describedby="emailHelp"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                        <div class="form-text ms-1">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="name" type="text" class="form-control" id="floatingInput1" placeholder="name">
                        <label for="floatingInput1">Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="passwordR" type="password" class="form-control" id="floatingPassword1"
                            placeholder="Repeat Password">
                        <label for="floatingPassword1">Repeat Password</label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Sign up</button>
                        <p class="pt-3 lead text-center">Already a member?
                            <a href="{{ route('get.login') }}"
                                class="text-danger fst-italic text-decoration-none">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
