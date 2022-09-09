<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
  public function __construct(){
    $this->middleware("auth:admin");
  }

    public function show(Product $product){

        return view("show")->with([
            "product" => $product,
        ]);
    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view("admin.products.create")->with(
            [
                "categories" => Category::all()
            ]
            );
    }

    /**
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "title" => "required|min:3",
            "description" => "required|min:5",
            "image" => "required|image|mimes:png,webp,jpg,jpeg|max:2080",
            "price" => "required|numeric",
            "category_id" => "required|numeric",
        ]);
        if($request->has("image")){
          $file = $request->image;
          $imageName = "images/products/".time()."_".$file->getClientOriginalName();
          $file->move(public_path("images/products"), $imageName);
          $title = $request->title;

          Product::create([
            "title" => $title,
            "slug" => Str::slug($title),
            "description" => $request->description,
            "price" => $request->price,
            "inStock" => $request->inStock,
            "category_id" => $request->category_id,
            "image" => $imageName
          ]);
          return redirect()->route("admin.products")->withSuccess("Product added");
        }
    }
    /**
     * 
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product){
        
        return view("admin.products.edit")->with([
            "product" => $product,
            "categories" => Category::all()
        ]);
    }
    
    /**
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product){
        $this->validate($request,[
            "title" => "required|min:3",
            "description" => "required|min:5",
            "image" => "image|mimes:png,jpg,webp,jpeg|max:2080",
            "price" => "required|numeric",
            "category_id" => "required|numeric",
        ]);
        if($request->has("image")){
          $image_path = public_path("images/products/". $product->image);
          if(File::exists( $image_path )){
            unlink($image_path);
          }
          $file = $request->image;
          $imageName = "images/products/".time()."_".$file->getClientOriginalName();
          $file->move(public_path("images/products"), $imageName);
          $product->image = $imageName;
        }
          $product->update([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "description" => $request->description,
            "price" => $request->price,
            "inStock" => $request->inStock,
            "category_id" => $request->category_id,
            "image" => $product->image
          ]);
          return redirect()->route("admin.products")->withSuccess("Product updated");
        
    }

    /**
     * 
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
          $image_path = public_path("images/products/". $product->image);
          if(File::exists( $image_path )){
            unlink($image_path);
          }
          $product->delete();
          return redirect()->route("admin.products")->withSuccess("Product deleted");
        
    }
}
