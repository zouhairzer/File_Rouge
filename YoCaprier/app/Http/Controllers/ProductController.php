<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{

    public function afficherAddProduct()
    {
        $getCategories = Category::all();
        return view('admin.product.add-product', compact('getCategories'));
    }


    public function add_product(Request $request)
    {
        $check = Product::where('name',$request->name)->first();

        if(!$check){

            $uploadFile = 'images/';
            $uploadFileName = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($uploadFile), $uploadFileName);

            $addProduct = new Product();
            $addProduct->name = $request->name ;
            $addProduct->description = $request->description ;
            $addProduct->status = $request->status ;
            $addProduct->price = $request->price ;
            $addProduct->quantite = $request->quantite ;
            $addProduct->category_id = $request->category ;
            $addProduct->image = $uploadFileName;

            $addProduct->save();

            return redirect('/Products')->with('success','Ajoute avec succès');
        }

    }



    public function delete_product(Request $request ,$id)
    {
        $deleteProduct = Product::find($request->id);
        $deleteProduct->delete();
        return redirect()->back();
    }



    public function show()
    {
        $getProducts = DB::table('products')->join('categories','products.category_id','categories.id')
                                            ->select('products.*', 'categories.name as category', 'categories.id as ')
                                            ->paginate(5);
        return view('admin.product.Products', compact('getProducts'));
    }



    public function get_products($id)
    {
        $getProduct = Product::find($id);
        $getCategories = Category::all();
        return view('admin.product.update-product', compact('getProduct', 'getCategories'));
    }



    public function update_products(Request $request)
    {
        $updateProduct = Product::findOrFail($request->id);

        $updateProduct->name = $request->name ;
        $updateProduct->description = $request->description ;
        $updateProduct->status = $request->status ;
        $updateProduct->price = $request->price ;
        $updateProduct->quantite = $request->quantite ;
        $updateProduct->category_id = $request->category ;


        if($request->file('image')){
            $uploadFile = 'images/';
            $uploadFileName = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($uploadFile), $uploadFileName);

            if($updateProduct->image){
                Storage::delete('images/',$updateProduct->image);
            }
            $updateProduct->image = $uploadFileName;
        }


        $updateProduct->save();

        return redirect('/Products')->with('success','');
    }


    // public function search(Request $request)
    // {
    //     $query = $request->input('search-product');
    //     $prodcuts = Product::where('name','like','%%')->get();
    //     return view('admin.product.Products', compact('prodcuts'));
    // }
}
