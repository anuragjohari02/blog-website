@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> EDIT POST</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/admin/post">Posts List</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
        <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h3 class="text-muted">Post Edit #{{ $posts->title }}</h3><hr>
                    <form action="/admin/{{ $posts->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="slug-source">Title </label>
                            <input type="text" value="{{ old('title',$posts->title) }}" id="slug-source" class="form-control" name="title" />
                        </div>
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif

                        <div class="form-group">
                            <label for="slug-target">Slug </label>
                            <input type="text" value="{{ old('slug',$posts->slug) }}" id="slug-target" class="form-control" name="slug" />
                        </div>
                        @if ($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                        @endif

                        <div class="form-group">
                            <label for="slug-content">Content </label>
                            <textarea name="content" rows="4" class="form-control" id="content">{!! old('content',$posts->content) !!}</textarea>
                        </div>
                        @if ($errors->has('content'))
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        @endif <br>

                        {{-- <button type="button" class="btn btn-dark" onClick="myFunction()">
                            Convert Title Into Slug
                        </button> --}}

                        <button type="submit" class="btn btn-dark">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection