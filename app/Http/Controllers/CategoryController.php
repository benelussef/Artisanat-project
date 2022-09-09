<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{

  public function __construct(){
    $this->middleware("auth:admin");
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.products.createcategory")->with(
            [
                "categories" => Category::all()
            ]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "title" => "required|min:3",
            "image" => "required|image|mimes:png,webp,jpg,jpeg|max:2080",
        ]);
        if($request->has("image")){
          $file = $request->image;
          $imageName = "images/categories/".time()."_".$file->getClientOriginalName();
          $file->move(public_path("images/categories"), $imageName);
          $title = $request->title;

          Category::create([
            "title" => $title,
            "slug" => Str::slug($title),
            "price" => $request->price,
            "image" => $imageName
          ]);
          return redirect()->route("admin.categories")->withSuccess("Category added");
       }}

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
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.products.editcategory")->with([
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            "title" => "required|min:3",
            "image" => "image|mimes:png,jpg,webp,jpeg|max:2080",
        ]);
        if($request->has("image")){
          $image_path = public_path("images/categories/". $category->image);
          if(File::exists( $image_path )){
            unlink($image_path);
          }
          $file = $request->image;
          $imageName = "images/categories/".time()."_".$file->getClientOriginalName();
          $file->move(public_path("images/categories"), $imageName);
          $category->image = $imageName;
        }
          $category->update([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "image" => $category->image
          ]);
          return redirect()->route("admin.categories")->withSuccess("Category updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $image_path = public_path("images/categories/". $category->image);
        if(File::exists( $image_path )){
          unlink($image_path);
        }
        $category->delete();
        return redirect()->route("admin.categories")->withSuccess("Category deleted");
    }
}
