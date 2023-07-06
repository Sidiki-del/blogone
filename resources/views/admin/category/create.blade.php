@extends('layouts.master')

@section('title', 'Add Category')
@section('content')


<div class="container-fluid px-4">


    <div class="card mt-4">
        <div class="card-header">
           <h1 class="mt-4">Add Category</h1>

        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">

            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
            </div>

            @endif
<form action="{{ url('admin/add_category')  }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label for="">Category Name</label>
<input type="text" name="name" class="form-control" id="">
</div>

<div class="mb-3">
<label for="">Slug</label>
<input type="text" name="slug" class="form-control" id="">
</div>

<div class="mb-3">
<label for="">Description</label>
<textarea name="description" id="mySummernote" class="form-control"  rows="5"></textarea>
</div>

<div class="mb-3">
<label for="">Image</label>
<input type="file" name="image" required class="form-control" id="">
</div>

<h4>SEO Tags</h4>
<div class="mb-3">
<label for="">Meta Title</label>
<input type="text" name="meta_title" class="form-control" id="">
</div>

<div class="mb-3">
<label for="">Meta Description</label>
<textarea name="meta_description" id="" class="form-control"  rows="3"></textarea>
</div>

<div class="mb-3">
<label for="">Meta Keyword</label>
<textarea name="meta_keyword" id="" class="form-control"  rows="3"></textarea>
</div>

<h6>Status Mode</h6>
<div class="row">
    <div class="col-md-3 mb-3">
        <label for="">Navbar Status</label>
        <input type="checkbox" name="navbar_status">
    </div>
     <div class="col-md-3 mb-3">
        <label for="">Status</label>
        <input type="checkbox" name="status">
    </div>
    <div class="col-md-6">
        <button class="btn btn-primary" type="submit">Save Category</button>
    </div>
</div>

@endsection
