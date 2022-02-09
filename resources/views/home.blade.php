@extends('layouts.app')

@section('content')
    @include('components.banner', ['image' => '/storage/images/Banner.jpg', 'text' => 'Welcome to Keypedia <br><h4> Find your perfect keyboard </h4>'])
    <div class="container p-3 my-4">
        <div class="h2 text-center my-4">
            Categories
        </div>
        <div class="row justify-content-center">
            @foreach ($categories as $category)
                @include('components.keyboard-menu-card', [ 'category' => $category ])
            @endforeach
        </div>
    </div>
@endsection
