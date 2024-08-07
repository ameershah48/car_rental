@extends('layouts.app')

@section('content')
    <div class="mt-3 card">
        <div class="card-header">
            Rentals
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Car</th>
                        <th scope="col">Status</th>
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
                                {{ $rental->user->name }}
                            </td>
                            <td>
                                {{ $rental->car->model ?? 'N/A' }}
                            </td>
                            <td>
                                {{ $rental->status }}
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

            {{ $rentals->links() }}
        </div>
    </div>
@endsection
