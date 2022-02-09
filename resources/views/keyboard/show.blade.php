@extends('layouts.app')

@section('content')
    @include('components.error-card')

    <div class="container mt-4">
        <div class="row">
            <div class="col-4">
                <img src="{{ Storage::url($keyboard->image) }}" style="height:300px; width:300px; object-fit:cover">
            </div>
            <div class="col-8">
                <div class="row">
                    <h1 class="font-weight-bold">{{ $keyboard->name }}</h1>
                </div>
                <div class="row">
                    <h3>Rp{{ number_format($keyboard->price) }}</h3>
                </div>
                <div class="row">
                    <p>{{ $keyboard->description }}</p>
                </div>
                <div class="row">
                    @cannot('manager', $keyboard)
                    <form method="post" action="{{ route('transaction.update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="keyboard_id" value="{{ $keyboard->id }}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label class="me-6" for="qty">Quantity</label>
                                </div>
                                <div class="col-1">
                                    <input class="ms-6" type="number" id="qty" name="qty" min="0" value="1">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">
                                Add to Cart
                            </button>
                        </div>
                    </form>
                    @endcannot
                </div>
            </div>
        </div>
    </div>
@endsection
