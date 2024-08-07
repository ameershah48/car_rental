<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|max:2048',
        ]);

        $car = new Car;
        $car->model = $request->model;
        $car->brand = $request->brand;
        $car->seater = $request->seater;
        $car->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->storePublicly('cars');
            $car->image = $path;
        }

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
            'image' => 'nullable|image|max:2048',
        ]);

        $car = Car::findOrFail($id);
        $car->model = $request->model;
        $car->brand = $request->brand;
        $car->seater = $request->seater;
        $car->price = $request->price;

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::delete($car->image);
            }

            $image = $request->file('image');
            $path = $image->storePublicly('cars');
            $car->image = $path;
        }

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
