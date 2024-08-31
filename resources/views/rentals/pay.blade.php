@extends('layouts.app')

@section('content')
    <div class="card">

        <div class="card-body">
            <p>
                Your payment is successful!
            </p>

            <a class="btn btn-primary" href="/rentals/{{ $rental->id }}">
                Return back
            </a>
        </div>

    </div>
@endsection
