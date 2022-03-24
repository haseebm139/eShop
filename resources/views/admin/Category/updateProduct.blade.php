{{-- dd() --}}
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-categories') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <input type="text" value="{{ $category->name }}" class="form-control" name="name" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $category->slug }}" class="form-control" name="slug" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea class="form-control"  name="description" id=""  rows="3">{{ $category->description }}</textarea>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $category->status =="1" ? 'checked': ' ' }}  name="status" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" {{ $category->popular == "1" ? 'checked': ' '  }} name="popular" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $category->meta_title }}" class="form-control" name="meta_title" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea class="form-control"  name="meta_keyword" id=""  rows="3">{{ $category->meta_keyword }}</textarea>

                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Discription</label>
                        <textarea class="form-control" name="meta_descrip" id=""  rows="3">{{ $category->meta_descrip }}</textarea>

                    </div>

                    @if ($category->image)
                        <img src="{{  asset('assets/uploads/category/'.$category->image) }}" alt="Product Image">
                    @endif
                    <div class="col-md-12 mb-3">
                        <label for="">Product Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                       <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
