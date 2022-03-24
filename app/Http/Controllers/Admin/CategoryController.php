<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return view('admin.Category.index', compact('category'));
    }

    public function add()
    {
        return view('admin.Category.add');
    }

    public function insert(Request $request)
    {
        $category = new Category();

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;

        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True ? '1': '0';
        $category->popular = $request->input('popular') == True ? '1': '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keyword = $request->input('meta_keyword');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->save();
        return redirect('/dashboard')->with('status','Category Added Successfully');
    }

    public function editProduct($id)
    {
        $category = Category::find($id);

        return view('admin.Category.updateProduct', compact('category'));
    }

    public function updateProduct(Request $request)
    {
        $category = Category::find($request->id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/category/'.$category->image;
            if (file_exists($path)) {

                unlink($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;

        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True ? '1': '0';
        $category->popular = $request->input('popular') == True ? '1': '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keyword = $request->input('meta_keyword');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->update();
        return redirect('/categories')->with('status','Category Update Successfully');

    }

    public function destory($id)
    {
        $category = Category::find($id);
        if($category->image){
            $path = 'assets/uploads/category/'.$category->image;
            if (file_exists($path)) {

                unlink($path);
            }
            $category->delete();
        }

        return redirect('/categories')->with('status','Category Deleted Successfully');
    }
}
