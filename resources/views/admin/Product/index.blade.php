@extends('layouts.admin')

@section('content')
    <div class="card">

        <div class="card-header">
            <h1>Product Page</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Original Price</th>
                        <th>Selling Price</th>
                        <th>Tax</th>
                        <th>Status</th>
                        <th>Trending</th>
                        <th>Action</th>
                    </tr>

                <tbody>
                    @foreach ($product as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/product/'.$product->image) }}" class="cate-image" alt="Image Here">
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->original_price }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->tax }}</td>
                            <td>{{ $product->status }}</td>
                            <td>{{ $product->trending }}</td>
                            <td>
                                <a href="{{ url('edit-product/'.$product->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-product/'.$product->id) }}" class="btn btn-danger">Del</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                </thead>

            </table>
        </div>
    </div>
@endsection
