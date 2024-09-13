<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bakingschoolclasses;
use App\Models\Payment;
use App\Models\Place;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function indexadmin()
    {
        $product = Product::count();
        $classes = Bakingschoolclasses::count();
        $reservations = Place::count();
        $sales = Payment::count();
        return view('admin.admin-index', compact('product','classes','reservations','sales'));
    }

}
