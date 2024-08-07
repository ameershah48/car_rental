@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Rental - {{ $rental->id }}
            </h5>
            <p class="card-text">
                Total Price: RM {{ $rental->total_price }} <br>
                Start Date: {{ $rental->start_date }} <br>
                End Date: {{ $rental->end_date }}
            </p>
        </div>
    </div>

    <div class="mt-3 card">
        <img src="{{ Storage::url($rental->car->image) }}" class="object-fit-cover" alt="img" style="height: 200px">

        <div class="card-body">
            <h5 class="card-title">
                {{ $rental->car->model ?? 'N/A' }}
            </h5>
            <p class="card-text">
                Seater: {{ $rental->car->seater ?? 'N/A' }} <br>
                Brand: {{ $rental->car->brand ?? 'N/A' }}
            </p>
        </div>
    </div>

    <div class="mt-3 card">
        <div class="card-header">
            Manage Rental
        </div>

        <div class="card-body">

            <div class="d-flex gap-2">

                @if ($rental->status == 'pending')
                    <form action="/rentals/{{ $rental->id }}/pay" method="post">
                        @csrf

                        <button class="btn btn-success">
                            Make Payment
                        </button>
                    </form>
                @endif

                @if ($rental->status == 'paid')
                    <form action="/rentals/{{ $rental->id }}/return" method="post">
                        @csrf

                        <button class="btn btn-primary">
                            Return to Owner
                        </button>
                    </form>
                @endif

                @if ($rental->status == 'pending' || $rental->status == 'paid')
                    <form action="/rentals/{{ $rental->id }}/cancel" method="post">
                        @csrf

                        <button class="btn btn-danger">
                            Cancel
                        </button>
                    </form>
                @endif

                @if ($rental->status == 'cancelled')
                    Rental Canceled.
                @endif

                @if ($rental->status == 'returned')
                    Returned to Owner.
                @endif

            </div>

        </div>
    </div>
@endsection
