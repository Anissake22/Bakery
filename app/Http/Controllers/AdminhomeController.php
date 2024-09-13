<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bakingschoolclasses;
use App\Models\Payment;
use App\Models\Place;
class AdminhomeController extends Controller
{
    public function index()
    {
        $product = Product::count();
        $classes = Bakingschoolclasses::count();
        $reservations = Place::count();
        $sales = Payment::count();
        return view('admin.admin-index', compact('product','classes','reservations','sales'));
    }
}
