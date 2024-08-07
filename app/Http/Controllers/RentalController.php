<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['car', 'user'])->paginate(5);

        return view('rentals.index', [
            'rentals' => $rentals
        ]);
    }
    public function create(Request $request)
    {
        $car_id = $request->car_id;
        $car = Car::findOrFail($car_id);

        return view('rentals.create', [
            'car' => $car
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $total_days = Carbon::parse($request->start_date)->diffInDays(Carbon::parse($request->end_date)) + 1;
        $car = Car::findOrFail($request->car_id);
        $total_price = $car->price * $total_days;

        $rental = new Rental;
        $rental->car_id = $request->car_id;
        $rental->user_id = auth()->id();
        $rental->start_date = $request->start_date;
        $rental->end_date = $request->end_date;
        $rental->total_price = $total_price;
        $rental->save();

        return redirect('/rentals/' . $rental->id);
    }

    public function show($id)
    {
        $rental = Rental::with(['car', 'user'])->findOrFail($id);

        return view('rentals.show', [
            'rental' => $rental,
        ]);
    }

    public function pay($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->status = 'paid';
        $rental->save();

        $car = Car::findOrFail($rental->car_id);
        $car->is_available = false;
        $car->save();

        return redirect('/rentals/' . $rental->id);
    }

    public function cancel($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->status = 'cancelled';
        $rental->save();

        $car = Car::findOrFail($rental->car_id);
        $car->is_available = true;
        $car->save();

        return redirect('/rentals/' . $rental->id);
    }

    public function return($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->status = 'returned';
        $rental->save();

        $car = Car::findOrFail($rental->car_id);
        $car->is_available = true;
        $car->save();

        return redirect('/rentals/' . $rental->id);
    }
}
