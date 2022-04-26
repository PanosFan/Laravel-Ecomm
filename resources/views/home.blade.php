<style>
    img {
        width: 20%
    }

</style>

@extends('layout.app')
@section('content')
    {{-- ============Carousel============ --}}
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ URL::asset('images/1.jpg') }}" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <p class="text-danger lead">Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('images/2.jpg') }}" class="d-block w-100">
                <div class=" carousel-caption d-none d-md-block">
                    <p class="text-danger lead">Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('images/3.jpg') }}" class="d-block w-100">
                <div class=" carousel-caption d-none d-md-block">
                    <p class="text-danger lead">Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- ============Carousel============ --}}

    <div class="container">
        <h3>Trending books</h3>
        <div class="row mt-4">
            @forelse ($data as $item)
                @if ($item['isTrending'] == 1)
                    <div class="col-3 text-center p-4">
                        <img src="{{ asset('images/' . $item->image) }}" alt="">
                        <div>Title: {{ $item->title }}</div>
                        <div>Author: {{ $item->author }}</div>
                        <div>Price: {{ $item->price }}&euro;</div>
                        <a href="#" class="btn btn-primary">Buy</a>
                        <a href="{{ route('get.book.details', $item->id) }}" class="btn btn-info">Details</a>
                    </div>
                @endif
            @empty
                <p>
                    No items yet
                </p>
            @endforelse
        </div>
    </div>
@endsection
