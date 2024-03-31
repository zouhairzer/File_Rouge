<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.Categories');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function afficher_add_category()
    {
        return view('admin.category.add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add_category(Request $request)
    {
        $check = Category::where('name',$request->name)->first();

        if(!$check){

            $category = Category::create([
                'name' => $request->name
            ]);

            return redirect('/Categories')->with('success','Ajoute avec succès');
        }
        else{
            return redirect()->back()->with('error','la catégorie existe déjà');
        }
    }



    public function show()
    {
        $categories  = Category::paginate(5);
        return view('admin.category.Categories',compact('categories'));
    }


    public function get_category($id)
    {
        $getCategories = Category::find($id);
        return view('admin.category.update-category', compact('getCategories'));
    }


    public function update_category(Request $request)
    {

        $updateCategory = Category::findOrFail($request->id);
        $updateCategory->name = $request->name;
        $updateCategory->update();
        // dd($updateCategory);
        return redirect('/Categories')->with('update','Mise à jour réussie');
    }



    public function delete_category($id)
    {
        $deleteCategory = Category::find($id);

        if($deleteCategory){
            $deleteCategory->delete();
            return redirect()->back()->with('delete','Suppression à réussie');
        }
        else{
            return redirect()->back()->with('Nodelete','Suppression à réussie');
        }
    }
}
