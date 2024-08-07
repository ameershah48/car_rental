@extends('layouts.app')

@section('content')
    <a href="/cars/create">
        <button class="btn btn-primary">
            Add New Car
        </button>
    </a>

    <div class="mt-3 card">
        <div class="card-header">Cars</div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Model</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Seater</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <th scope="row">
                                {{ $car->id }}
                            </th>
                            <td>
                                {{ $car->model }}
                            </td>
                            <td>
                                {{ $car->brand }}
                            </td>
                            <td>
                                {{ $car->seater }}
                            </td>
                            <td>
                                {{ $car->formattedPrice() }}
                            </td>
                            <td>
                                <a href="/cars/{{ $car->id }}">
                                    <button class="btn btn-sm btn-secondary">
                                        View
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $cars->links() }}
        </div>
    </div>
@endsection
