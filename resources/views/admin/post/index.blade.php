@extends('layouts.master')

@section('title', 'Blog Dashboard')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
   <h4>View Posts <a class="btn btn-primary btn-sm float-end" href="{{ url('admin/add_post') }}">Add Post</a></h4>

   <div class="card-body">

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Post Name</th>
                <th>Category Name</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                 <tr>
                <td>{{ $item ->id }}</td>
                <td>{{ $item ->name }}</td>
                <td>{{ $item ->category->name }}</td>
                <td>{{ $item ->status== '1' ? 'Hidden': 'Visible' }}</td>
                <td>
                    <a href="{{ url('admin/post/'.$item ->id) }}" class="btn btn-success">Edit</a>
                </td>

                <td>
                    <a href="{{ url('admin/delete_post/'.$item ->id) }}" class="btn btn-danger">Delete</a>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>

</div>
</div>


</div>

@endsection
