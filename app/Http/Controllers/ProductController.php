<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Payment;
use DB;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }


    public function cart()
    {
        return view('cart');
    }


    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name_product" => $product->name_product,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


    public function checkout(Request $request){
        /*DB::insert('insert into payments (full_name, email, address, city,state,zip_code,name_on_card,
        credit_card_number,exp_month, exp_year,CVV) 
        values (?, ?, ?, ?, ?, ?,?,?,?,?,?)', [$request->full_name, $request->email, $request->address,
        $request->city,$request->state,$request->zip_code,$request->name_on_card,
        $request->credit_card_number,$request->exp_month,$request->exp_year, $request->CVV]);*/

        $input = $request->all();
        Payment::create($input);
         return redirect('/paidproduct')->with('success','checkout made successfully.');
    }
    public function paidproducts()
    {
        $payments = Payment::all()->where('id_user',Auth::user()->id);
        return view('/paidproduct', compact('payments'));
    }
}
