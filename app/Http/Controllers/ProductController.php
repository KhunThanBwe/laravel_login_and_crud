<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function productList(Request $request) {

        // $products = DB::table('products')->get();
        $products = Product::all();

        // $user = Auth::user(); // get login user
        // $userId = Auth::id(); // get login user id
        // if(Auth::check()) { // check login
        //     echo "Logged in";
        // }



        return view('index', compact('products'));
        
    }


    public function createForm() {
        return view('product_create');
    }

    public function storeProduct(Request $request) 
    {
        //condation
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required'
        ]);
        //insert value
        $result = Product::insert([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'created_at' => now()
        ]);

        // Proudct::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'description' => $request->description,
        // ]);

        if($result) {
            return redirect()->route('product_list')->with('success', 'Product created successfully.');
        }else {
            return redirect()->route('product_create_form')->with('error', 'Something wrong!');
        }

    }



    public function getProduct($id) {
        // $product = DB::table('products')->where('id', $id)->first();

        $product = Product::findOrFail($id);

        return view('product_update', compact('product'));


    }

    public function updateProduct(Request $request, $id) {
        $product = Product::findOrFail($id);


        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        if($product) {
            $result = $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'user_id' => Auth::id(),
                'updated_at' => now()
            ]);

            if($result) {
                return redirect()->route('product_list')->with('success', 'Product updated successfully.');
            }else {
                return redirect()->route('get_product')->with('error', 'Something wrong!');
            }

        }
    }


    public function deleteProduct($id) {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('product_list')->with('success', 'Product deleted successfully.');
    }

    public function getUser() {
        $user = Auth::user();
        // $user = auth()->user();

        $id = Auth::id();
        // $id = auth()->user()->id;

        return $user;
    }


    // ============

    // DB::table('products')->insert();

    // Product::insert();

    //=========
}
