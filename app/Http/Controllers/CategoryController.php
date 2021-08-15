<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function manage(){
        $category=Category::latest()->get();
        return view('category.manage-category',['categories'=>$category]) ;
    }
    public function createForm(){
        return view('category.create-category');
    }
    public function create(Request $request){
        $name = $request->name;
        Category::create([
            'name' => $name,
            'slug' => Str::slug($name)
        ]);
        return redirect()->route('category.manage') ;
    }
    public function updateForm(Category $category){
        return view('category.update-category',['category' => $category]);

    }
    public function update(Request $request, Category $category){
        
        $category->update([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name)
        ]);
        $category=Category::latest()->get();
        return redirect()->route('category.manage') ;
    }
    public function delete(Category $category){
    
        $category->delete();
        return redirect()->route('category.manage') ;
    }
}
