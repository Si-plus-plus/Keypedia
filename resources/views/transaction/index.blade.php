@extends('layouts.app')

@section('content')
    <div class="container p-3">
        <div class="h1 text-center p-4">
            Your Transaction History
        </div>

        <div class="container">
            @foreach ($transactions as $transaction)
                <a class="row text-center btn-block" href="{{ route('transaction.show', ['transaction' => $transaction->id]) }}">
                    Transaction at {{ $transaction->date }}
                </a>
            @endforeach
        </div>

        @if (count($transactions) === 0)
            <div class="h3">
                You have no transaction history
            </div>
        @endif
    </div>
@endsection
