@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row gap-4">
            @foreach ($cars as $car)
                <div class="col-3">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
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
    </div>
@endsection
