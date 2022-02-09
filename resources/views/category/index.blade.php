@extends('layouts.app')

@section('content')
    <div class="container p-3">
        <div class="h1 text-center p-4">
            Manage Categories
        </div>

        <div class="row justify-content-center">
            @foreach ($categories as $category)
                @include('components.keyboard-menu-card', [ 'category' => $category ])
            @endforeach
        </div>

    </div>
@endsection
