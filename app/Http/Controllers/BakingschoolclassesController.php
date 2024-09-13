<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Bakingschoolclasses;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreBakingschoolclassesRequest;
use App\Http\Requests\UpdateBakingschoolclassesRequest;

class BakingschoolclassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Bakingschoolclasses::all();
        return view('Bakingschool', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBakingschoolclassesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bakingschoolclasses $bakingschoolclasses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bakingschoolclasses $bakingschoolclasses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBakingschoolclassesRequest $request, Bakingschoolclasses $bakingschoolclasses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bakingschoolclasses $bakingschoolclasses)
    {
        //
    }
    public function reservePlace(Request $request)
    {
        DB::insert('insert into places (id_user, id_class, number_place, date_reservation_place,
        date_admin_validation_place,status) 
        values (?, ?, ?, ?, ?, ?)', [$request->id_user, $request->id_class, $request->number_place,date('Y-m-d'),
        date('Y-m-d'), $request->status]);
         return redirect('/place')->with('success','Reservation created successfully.');
         
    }
}
