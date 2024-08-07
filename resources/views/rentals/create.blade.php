@extends('layouts.app')

@section('content')
    <div class="card">
        <img src="{{ Storage::url($car->image) }}" class="object-fit-cover" alt="img" style="height: 200px">

        <div class="card-body">
            <h5 class="card-title">
                {{ $car->model }}
            </h5>
            <p class="card-text">
                Seater: {{ $car->seater }} <br>
                Price: RM {{ $car->price }} <br>
            </p>
        </div>
    </div>

    <div class="mt-3 card">
        <div class="card-header">Rent Now</div>

        <div class="card-body">

            <form action="/rentals/create" method="post">
                @csrf

                <div class="mb-3">
                    <label for="start_date" class="form-label">
                        Start Date
                    </label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">
                        End Date
                    </label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>

                <input type="hidden" name="car_id" value="{{ $car->id }}">

                <div class="mb-3">
                    <button class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
