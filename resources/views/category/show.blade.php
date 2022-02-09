@extends('layouts.app')

@section('content')
    @include('components.banner', ['image' => Storage::url($category->image), 'text' => $category->name."<br><h4>Category</h4>"])
    <div class="container p-3">
        <div class="m-2 p-2">
            <form class="form-row" action="{{ route('category.show', ['category' => $category->id]) }}" method="get">
                <div class="form-group">
                    <select class="form-control" id="searchType" name="filterType">
                        <option value="name" selected>Name</option>
                        <option value="price">Price</option>
                    </select>
                </div>
                <div class="form-group ml-2 pl-2">
                    <input type="text" class="form-control" id="txtSearch" placeholder="Search" name="queryText">
                </div>
                <div class="mx-2 px-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <div class="row">
            @foreach ($keyboards as $keyboard)
                @include('components.keyboard-card', [ 'keyboard' => $keyboard ])
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $keyboards->links() }}
        </div>
    </div>
@endsection
