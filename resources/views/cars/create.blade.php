@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Car') }}</div>

                    <div class="card-body">

                        <form action="/cars/create" method="post">

                            @csrf

                            <div class="mb-3">
                                <label for="model" class="form-label">
                                    Model
                                </label>
                                <input type="text" class="form-control" id="model" name="model">
                            </div>

                            <div class="mb-3">
                                <label for="brand" class="form-label">
                                    Brand
                                </label>
                                <input type="text" class="form-control" id="brand" name="brand">
                            </div>

                            <div class="mb-3">
                                <label for="seater" class="form-label">
                                    Seater
                                </label>
                                <input type="number" class="form-control" id="seater" name="seater">
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">
                                    Price
                                </label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
