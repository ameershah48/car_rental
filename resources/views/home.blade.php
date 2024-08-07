@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($cars as $car)
            <div class="col-md-4 col-sm-6 p-2">
                <div class="card">
                    <img src="{{ Storage::url($car->image) }}" class="object-fit-cover" alt="img" style="height: 200px">

                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $car->model }}
                        </h5>
                        <p class="card-text">
                            Brand: {{ $car->brand }} <br>
                            Seater: {{ $car->seater }} <br>
                            Price: {{ $car->formattedPrice() }} <br>
                        </p>
                        <a href="/rentals/create?car_id={{ $car->id }}" class="btn btn-primary">Rent Now</a>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection
