@extends('layouts.app')

@section('content')
    <div class="container p-3">
        <div class="h1 text-center p-4">
            Your Cart
        </div>

        @if (count ($items) > 0)
            <div class="row">
                <div class="col-9">
                    @php ($totalPrice = 0)
                    @php ($valid = 1)

                    @foreach ($items as $item)
                        @include('components.cart-card', [ 'item' => $item ])
                        @php ($totalPrice += $item->qty * $item->keyboard->price)
                        @if ($item->keyboard->trashed())
                            @php ($valid = 0)
                        @endif
                    @endforeach
                </div>
                <div class="col-1"></div>
                <div class="col-2">
                    <div class="row ">
                        Total Price:
                    </div>
                    <div class="row font-weight-bold">
                        @if ($valid == 1)
                            Rp{{ number_format($totalPrice) }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="row mt-4">
                        <form action="{{ route('transaction.checkout') }}" method="post">
                            {{ csrf_field() }}
                            <button class="btn btn-bg btn-primary" type="submit" @if ($valid == 0) disabled @endif>
                                Checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <h4>Cart's empty</h4>
        @endif

    </div>
@endsection
