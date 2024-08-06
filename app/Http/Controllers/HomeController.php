<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cars = Car::query()
            ->where('is_available', true)
            ->get();

        return view('home', [
            'cars' => $cars
        ]);
    }

    public function my_rentals()
    {
        $rentals = Rental::query()
            ->with(['car'])
            ->where('user_id', auth()->id())
            ->paginate(5);

        return view('my_rentals', [
            'rentals' => $rentals
        ]);
    }
}
