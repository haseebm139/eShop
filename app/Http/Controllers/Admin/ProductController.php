<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function index()
    {
        $product = Product::all();

        return view('admin.Product.index', compact('product'));
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.Product.add', compact('category'));
    }

    public function insert(Request $request)
    {
        $product = new Product();

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product/',$filename);
            $product->image = $filename;

        }

        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == True ? '1': '0';
        $product->trending = $request->input('trending') == True ? '1': '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keyword = $request->input('meta_keyword');
        $product->meta_descrip = $request->input('meta_descrip');
        $product->save();
        return redirect('/dashboard')->with('status','Product Added Successfully');
    }

    public function editProduct($id)
    {
        $product = Product::find($id);

        return view('admin.Product.updateProduct', compact('product'));
    }

    public function updateProduct(Request $request)
    {
        $product = Product::find($request->id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/product/'.$product->image;
            if (file_exists($path)) {

                unlink($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product/',$filename);
            $product->image = $filename;

        }
        // $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == True ? '1': '0';
        $product->trending = $request->input('trending') == True ? '1': '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keyword = $request->input('meta_keyword');
        $product->meta_descrip = $request->input('meta_descrip');
        $product->update();
        return redirect('/products')->with('status','Product Update Successfully');

    }

    public function destory($id)
    {
        $product = Product::find($id);
        if($product->image){
            $path = 'assets/uploads/product/'.$product->image;
            if (file_exists($path)) {

                unlink($path);
            }
            $product->delete();
        }

        return redirect('/products')->with('status','Product Deleted Successfully');
    }
}
