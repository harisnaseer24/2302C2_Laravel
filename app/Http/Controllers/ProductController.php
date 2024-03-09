<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use Illuminate\Http\Request;
class ProductController extends Controller
{   
    
    public function getProducts(){

        // return view("products",["products"=>ProductModel::orderBy("id","desc")->get()]);
        return view("products",["products"=>ProductModel::get()]);
    }
    public function deleteProduct($id){
        // return view("AddProduct");
        ProductModel::destroy($id);
        return back()->withSuccess("Product Deleted Successfully");
    }
    

    public function showAddProductForm(){
        return view("AddProduct");
    }
    
    public function addProduct(Request $request){
    //    dd($request->all());
       $request->validate([
        "title"=>"required",
        "description"=> "required",
        "price"=> "required",
        "stock"=> "required",
        "image"=> "required|image|mimes:png,jpg,jpeg| max:10000",
       ]);

       $imagename = time().".".$request->image->extension();
       $request->image->move(public_path("/product_uploads"), $imagename);
       $product = new ProductModel;
       $product->title = $request->title;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->stock = $request->stock;
       $product->image = $imagename;
       $product->save();
       return back()->withSuccess("Product added Successfully..!");
    }

    public function editProduct($id){
      
        return view("editProduct", ["product"=>ProductModel::find($id)]);
    }
    public function updateProduct(Request $request, $id){
        $request->validate([
            "title"=>"required",
            "description"=> "required",
            "price"=> "required",
            "stock"=> "required",
            "image"=> "required |mimes:png,jpg,jpeg| max:10000",
           ]);
           $imagename = time().".".$request->image->extension();
           $request->image->move(public_path("/product_uploads"), $imagename);

           $product = ProductModel::find($id);
           $product->title = $request->title;
           $product->description = $request->description;
           $product->price = $request->price;
           $product->stock = $request->stock;
           $product->image = $imagename;
           $product->save();
           return back()->withSuccess("Product updated Successfully..!");
    }
  
    public function searchProduct(Request $request){
        $search = $request->input('query');
        $products = ProductModel::where('title','like','%'. $search.'%')->orWhere('description','like','%'. $search .'%')->get();

        return view("products",compact('products'));

    }

}
