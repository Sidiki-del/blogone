@extends('layouts.master')

@section('title', 'Add Post')

@section('content')
<div class="container-fluid px-4">

                        <div class="card mt-4">
                              @if($errors->any())
                                    <div class="alert alert-danger">

                                    @foreach($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                    </div>

             @endif
                             <div class="card-header">
                        <h4>Edit Posts <a class="btn btn-primary btn-sm float-end" href="{{ url('admin/add_post') }}">Efit Post</a></h4>


        </div>

        <div class="card-body">

             @if($errors->any())
                                    <div class="alert alert-danger">

                                    @foreach($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                    </div>
                                    @endif

            <form action="{{ url('admin/update_post/'.$post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Category</label>
                        <select name="category_id" required class="form-control" id="">
                    <option value="">-- Select Category --</option>

                            @foreach ($category as $cateitem)
                                 <option value="{{ $cateitem->id}}"  {{ $post->category_id == $cateitem->id ? 'selected': ''}}> {{ $cateitem->name}}</option>
                            @endforeach

                        </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" value="{{ $post->name }}" name="name" class="form-control">
                </div>

                 <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $post->slug }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>

                    <textarea name="description" class="form-control" id="mySummernote" rows="4">{!! $post->description !!}</textarea>

                </div>

                <div class="mb-3">
                    <label for="">Youtube IFrame Link</label>
                    <input type="text" value="{{ $post->yt_iframe }}" name="yt_iframe" class="form-control">
                </div>

                <h4>SEO Tags</h4>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control">
                </div>

                 <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{!! $post->meta_description !!}</textarea>
                </div>

                 <div class="mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea name="meta_keyword" class="form-control" rows="3"> {!! $post->meta_keyword !!}</textarea>
                </div>

                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input {{ $post->status == '1' ? 'checked': '' }} type="checkbox" name="status">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <button class="btn btn-primary float-end" type="submit">Update Post</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
                             </div>
                             </div>

@endsection
