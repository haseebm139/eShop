@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-products') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id">
                            @foreach ($category as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea class="form-control" name="small_description" id=""  rows="3"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id=""  rows="3"></textarea>

                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Orignal Price</label>
                        <input type="number" class="form-control" name="original_price">

                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price">

                    </div>

                     <div class="col-md-12 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="qty">

                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" name="tax">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox"  name="status" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox"  name="trending" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea class="form-control" name="meta_keyword" id=""  rows="3"></textarea>

                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Discription</label>
                        <textarea class="form-control" name="meta_descrip" id=""  rows="3"></textarea>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Product Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                       <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
