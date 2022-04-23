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
                    <div class="mb-3 text-black">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" aria-describedby="emailHelp">
                        <div class="form-text text-black-50">We'll never share your email with anyone else.
                        </div>
                    </div>

                    <div class="mb-3 text-black">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="mb-3 text-black">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>
                    <div class="mb-3 text-black">
                        <label for="passwordR" class="form-label">Repeat Password</label>
                        <input name="passwordR" type="password" class="form-control">
                    </div>
                    <div class="mb-3 text-black form-check">
                        <input name="checkBox" type="checkbox" class="form-check-input">
                        <label class="form-check-label" for="checkBox">Remember me</label>
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
