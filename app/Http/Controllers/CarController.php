<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(5);

        return view('cars.index', [
            'cars' => $cars
        ]);
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'brand' => 'required',
            'seater' => 'required',
            'price' => 'required',
        ]);

        $car = new Car;
        $car->model = $request->model;
        $car->brand = $request->brand;
        $car->seater = $request->seater;
        $car->price = $request->price;
        $car->save();

        return redirect('/cars');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);

        return view('cars.show', [
            'car' => $car
        ]);
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);

        return view('cars.edit', [
            'car' => $car
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'model' => 'required',
            'brand' => 'required',
            'seater' => 'required',
            'price' => 'required',
        ]);

        $car = Car::findOrFail($id);
        $car->model = $request->model;
        $car->brand = $request->brand;
        $car->seater = $request->seater;
        $car->price = $request->price;
        $car->save();

        return redirect('/cars/' . $id);
    }

    public function delete($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect('/cars');
    }
}
