@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">User Details</div>

        <div class="card-body">

            <div class="mb-3">
                <label for="model" class="form-label">
                    Name
                </label>

                <p>
                    {{ $user->name }}
                </p>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">
                    Email
                </label>

                <p>
                    {{ $user->email }}
                </p>
            </div>
        </div>
    </div>

    <div class="mt-3 card">
        <div class="card-header">
            Rentals History
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Car</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($rentals as $rental)
                        <tr>
                            <th scope="row">
                                {{ $rental->id }}
                            </th>

                            <td>
                                {{ $rental->car->model ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $rental->formattedPrice() }}
                            </td>

                            <td>
                                <a href="/rentals/{{ $rental->id }}">
                                    <button class="btn btn-sm btn-secondary">
                                        View
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
