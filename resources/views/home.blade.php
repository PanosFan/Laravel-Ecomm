@extends('layout.app')
@section('content')
    <div class="container">
        <h1>{{ session()->get('user_id') }}</h1>
    </div>
@endsection
