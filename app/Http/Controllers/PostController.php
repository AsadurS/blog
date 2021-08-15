<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function manage(){
        $post=Post::latest()->get();
        return view('post.manage-post',['posts'=>$post]) ;
    }
    public function createForm(){
        $categories = Category::all();
        return view('Post.create-post',compact('categories'));
    }
    public function create(Request $request){
        if($request->file('image')){
            $completeImageName=$request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeImageName,PATHINFO_FILENAME);
            $extension    = $request->file('image')->getClientOriginalExtension();
            $image        = str_replace(' ','_',$fileNameOnly). '-'.rand(). '_'.time(). '.'.$extension;
            $path          = $request->file('image')->storeAs('public/post', $image);
            $path          = Storage::url($path);
        }
      
        $post=Post::create([
            'title'             =>$request->title,
            'slug'              =>Str::slug($request->title),
            'image'             =>$path,
            'description'       =>$request->description,
            'category_id'       =>$request->category_id
        ]);
        return redirect()->route('post.manage') ;

    }
    public function updateForm(Post $Post){
        $categories=Category::all();
        return view('Post.update-Post',['post' => $Post, 'categories'=>$categories]);
        
    }
    public function update(Request $request,Post $post){
        if($request->file('image')){
            $completeImageName=$request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeImageName,PATHINFO_FILENAME);
            $extension    = $request->file('image')->getClientOriginalExtension();
            $image        = str_replace(' ','_',$fileNameOnly). '-'.rand(). '_'.time(). '.'.$extension;
            $path          = $request->file('image')->storeAs('public/post', $image);
            $path          = Storage::url($path);
        }
        else{
            $path          = $post->image;
        }
     
        
        $id = $request->id;
        $post=$post->update([
            'title'             =>$request->title,
            'slug'              =>Str::slug($request->title),
            'image'             =>$path,
            'description'       =>$request->description,
            'category_id'       =>$request->category_id
        ]);
        $post=Post::latest()->get();
        return redirect()->route('post.manage') ;
        
    }
    public function delete(Post $post){
        $post->delete();
        return redirect()->route('post.manage') ;
    }
    
}
