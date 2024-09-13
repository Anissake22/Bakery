<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AdminreservationController extends Controller
{
   public function __construct()
    {
        $this->middleware('role_admin:admin,staff');
    }
 /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return view('admin.reservation.index-places', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request , [
            'number_place'          => 'required',
            'date_reservation_place'         => 'required',
            'status'         => 'required',
        ]);

        $input = $request->all();
        $input['image'] = null;

        if ($request->hasFile('image')){
            $input['image'] = '/public/img/'.Str::slug($input['name_class'], '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/public/img/'), $input['image']);
        }

        Bakingschoolclasses::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Class Created'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $place = Place::find($id);
        return $place;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $input = $request->all();
        $placeuk = Place::findOrFail($id);

        if($request->statut == 'validated'){
            $placeuk->update(['status'=>'Validated', 'date_admin_validation_place'=> date("Y-m-d")]);
        }else if($request->statut == 'rejected'){
            $placeuk->update(['status'=>'Rejected', 'date_admin_validation_place'=> date("Y-m-d")]);
        }
 
        return response()->json([
            'success' => true,
            'message' => 'Reservation Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $placeuct = Place::findOrFail($id);

        /**if (!$placeuct->image == NULL){
            unlink(public_path($placeuct->image));
        }*/

        Place::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Class Deleted'
        ]);
    }

    public function apiPlaces(){
       
        $place =DB::table('places')
                ->join('users', 'users.id', '=', 'places.id_user')
                ->join('bakingschoolclasses', 'bakingschoolclasses.id', '=', 'places.id_class')
                ->select('places.id as id_place','users.name','bakingschoolclasses.name_class','places.number_place', 
                'places.date_reservation_place','places.date_admin_validation_place','places.status')
                ->get();
        return Datatables::of($place)
        
            ->addColumn('id', function ($place){
                return $place->id_place;
            })
            ->addColumn('name', function ($place){
                return $place->name;
            })
            ->addColumn('name_class', function ($place){
                return $place->name_class;
            })

            ->addColumn('number_place', function ($place){
                return $place->number_place;
            })
            ->addColumn('date_reservation_place', function ($place){
                return $place->date_reservation_place;
            })
            ->addColumn('date_admin_validation_place', function ($place){
                return $place->date_admin_validation_place;
            })
            ->addColumn('status', function ($place){
                return $place->status;
            })

            ->addColumn('action', function($place){
                return'<a onclick="ValidateReservation('. $place->id_place .')" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-check"></i> Validate</a> ' .
                    '<a onclick="RejectReservation('. $place->id_place .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Reject</a>';
            })
            ->rawColumns(['id', 'name','name_class','number_place', 'date_reservation_place','date_admin_validation_place','status','action'])->make(true);

    }
}
