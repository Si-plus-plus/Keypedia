@extends('layouts.app')

@section('content')
    @include('components.error-card')

    <div class="container p-3">
        <div class="h1 text-center p-4">
            Add New Keyboard
        </div>
        <div class="row justify-content-center">
            <form class="col-8" enctype="multipart/form-data" action="{{ route('keyboard.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="categoryType" class="col-form-label">Category</label>
                    <select class="form-control" id="categoryType" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="txtName" class="col-form-label">Keyboard Name</label>
                    <input type="text" class="form-control" id="txtName" name="name">
                </div>
                <div class="form-group row">
                    <label for="txtPrice" class="col-form-label">Keyboard Price (Rp)</label>
                    <input type="number" class="form-control" id="txtPrice" name="price">
                </div>
                <div class="form-group row">
                    <label for="txtDescription" class="col-form-label">Description</label>
                    <textarea class="form-control" id="txtDescription" rows="4" name="description"></textarea>
                </div>
                <div class="form-group row">
                    <label for="fileImage" class="col-form-label">Keyboard Image</label>
                    <input type="file" class="form-control-file" id="fileImage" name="image">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary w-25 mx-auto">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
