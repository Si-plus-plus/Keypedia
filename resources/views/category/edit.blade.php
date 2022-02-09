@extends('layouts.app')

@section('content')
    @include('components.error-card')

    <div class="container p-3">
        <div class="h1 text-center p-4">
            Update Category
        </div>
        <div class="row">
            <div class="col-3">
                <img class="img-thumbnail" src="{{ Storage::url($category->image) }}" alt="NO IMAGE" style="height:200px; width:200px; object-fit:cover">
            </div>
            <div class="col-9">
                <form method="post" enctype="multipart/form-data" action="{{ route('category.update', ['category' => $category->id]) }}">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group row">
                        <label for="txtName" class="col-form-label">Category Name</label>
                        <input type="text" class=" form-control" id="txtName" name="name" value="{{ $category->name }}">
                    </div>
                    <div class="form-group row">
                        <label for="fileImage" class="col-form-label">Category Image</label>
                        <input type="file" class=" form-control-file" id="fileImage" name="image">
                    </div>
                    <div class="row">
                        <div ></div>
                        <button type="submit" class=" btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
