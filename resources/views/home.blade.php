@extends('layout.app')
@section('content')
    <div class="container">
        <h1>{{ session()->get('user_id') }}</h1>
        <h1>{{ session()->get('role') }}</h1>
    </div>
@endsection
