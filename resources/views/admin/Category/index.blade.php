@extends('layouts.admin')

@section('content')
    <div class="card">

        <div class="card-header">
            <h1>Category Page</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>

                        <th>Description</th>
                        <th>Status</th>
                        <th>Popular</th>

                        <th>Action</th>
                    </tr>

                <tbody>
                    @foreach ($category as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>

                            <td>
                                <img src="{{ asset('assets/uploads/category/'.$category->image) }}" class="cate-image" alt="Image Here">
                            </td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->status }}</td>
                            <td>{{ $category->popular }}</td>
                            <td>
                                <a href="{{ url('edit-categories/'.$category->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-categories/'.$category->id) }}" class="btn btn-danger">Del</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                </thead>

            </table>
        </div>
    </div>
@endsection
