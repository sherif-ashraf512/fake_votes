<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function list(){
      $products = Product::count();
      $reviews = Review::count();
      $orders = Order::count();
      return view('content.admin.products.list',compact('products','reviews','orders'));
    }

    public function getList(){
      $products = Product::orderBy('id','desc')->get();

      return response()->json(['data'=>$products]);
    }

    public function create(){
      return view('content.admin.products.add');
    }

    public function store(Request $request){
      $validateData = $request->validate([
        'title' => 'required',
        'price' => 'required',
        'description' => 'sometimes',
        'image' => 'sometimes|image|mimes:jpg,webp,png,jpeg',
      ]);

      if ($request->hasFile('image')) {
        // Get the uploaded file
        $image = $request->file('image');
        $imageName = 'img/Products/' . Str::uuid() . '_product.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('assets/img/Products');

        // Ensure the directory exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true); // Create directory recursively
        }

        $image->move($destinationPath, basename($imageName));
        $validateData['image'] = $imageName;
    }

      Product::create($validateData);

      return redirect()->route('product-list');
    }

    public function show(Product $product){
      return view('content.admin.products.show',compact('product'));
    }

    public function edit(Product $product){
      return view('content.admin.products.edit',compact('product'));
    }

    public function Update(Request $request, Product $product){
      $validateData = $request->validate([
        'title' => 'required',
        'price' => 'required',
        'description' => 'sometimes',
        'image' => 'sometimes|image|mimes:jpg,webp,png,jpeg',
      ]);

      if ($request->hasFile('image')) {
        // Get the uploaded file
        $image = $request->file('image');
        $imageName = 'img/Products/' . Str::uuid() . '_product.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('assets/img/Products');

        // Ensure the directory exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true); // Create directory recursively
        }

        $image->move($destinationPath, basename($imageName));
        $validateData['image'] = $imageName;

        if($product->image){
          $imagePath = public_path("assets/{$product->image}");
          if (file_exists($imagePath)) {
            unlink($imagePath);
          }
        }
    }

      $product->update($validateData);

      return redirect()->route('product-list');
    }

    public function destroy(Product $product){
      if($product->image){
        $imagePath = public_path("assets/{$product->image}");
        if (file_exists($imagePath)) {
          unlink($imagePath);
        }
      }

      $product->delete();

      return redirect()->back();
    }
}
