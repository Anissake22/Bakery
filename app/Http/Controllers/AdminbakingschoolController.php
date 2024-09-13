<?php

namespace App\Http\Controllers;


use App\Models\Bakingschoolclasses;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AdminbakingschoolController extends Controller
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
        $classes = Bakingschoolclasses::all();
        return view('admin.bakingschool.index-classes', compact('classes'));
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
            'name_class'          => 'required|string',
            'description'         => 'required',
            'image'         => 'required',
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

        $class = Bakingschoolclasses::find($id);
        return $class;
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

        $this->validate($request , [
            'name_class'          => 'required|string',
            'description'         => 'required',
        ]);

        $input = $request->all();
        $classuk = Bakingschoolclasses::findOrFail($id);

        $input['image'] = $classuk->image;

        if ($request->hasFile('image')){
            if (!$classuk->image == NULL){
                unlink(public_path($classuk->image));
            }
            $input['image'] = '/public/img/'.Str::slug($input['name_class'], '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/public/img/'), $input['image']);
        }

        $classuk->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Class Update'
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
        $classuct = Bakingschoolclasses::findOrFail($id);

        if (!$classuct->image == NULL){
            unlink(public_path($classuct->image));
        }

        Bakingschoolclasses::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Class Deleted'
        ]);
    }

    public function apiClasses(){
        $class = Bakingschoolclasses::all();

        return Datatables::of($class)
            ->addColumn('name_class', function ($class){
                return $class->name_class;
            })
            ->addColumn('image', function($class){
                if ($class->image == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($class->image) .'" alt="">';
            })
            ->addColumn('action', function($class){
                return'<a onclick="editForm('. $class->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $class->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['name_class','image','action'])->make(true);

    }
}
