@extends('layouts.app')

@section('content')
    <div class="row gap-4">
        @foreach ($cars as $car)
            <div class="col-4">
                <div class="card">
                    <img src="http://placehold.it/200" class="object-fit-cover" alt="img" style="height: 200px">

                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $car->model }}
                        </h5>
                        <p class="card-text">
                            Seater: {{ $car->seater }} <br>
                            Price: RM {{ $car->price }} <br>
                        </p>
                        <a href="/rentals/create?car_id={{ $car->id }}" class="btn btn-primary">Rent Now</a>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection
