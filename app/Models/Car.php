<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function formattedPrice()
    {
        return 'RM ' . number_format($this->price / 100, 2);
    }
}
