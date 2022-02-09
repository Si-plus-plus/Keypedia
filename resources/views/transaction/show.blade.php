@extends('layouts.app')

@section('content')
    <div class="container p-3">
        <div class="h1 text-center p-4">
            Your Transaction at {{ $date }}
        </div>

        @php ($totalPrice = 0)

        <div class="row row-cols-1">
            @foreach ($items as $item)
                @include('components.transaction-item-card', [ 'item' => $item ])
                @php ($totalPrice += $item->qty * $item->keyboard->price)
            @endforeach
            <div class="row border mb-2 font-weight-bold">
                <div class="col-10 py-2 text-right">
                  Total Price:
                </div>
                <div class="col-2 py-2 text-right">
                  Rp{{ number_format($totalPrice) }}
                </div>
            </div>
        </div>
    </div>
@endsection
