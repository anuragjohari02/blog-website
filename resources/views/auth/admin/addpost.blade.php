@extends('layouts.master')

@section('content')
    {{-- <div class="container">
        <div class="text-right">
            <a href="/" class="btn btn-dark mt-2">Post</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <form action="/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                        </div>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif

                        <div class="form-group">
                            <label for="">Slug</label>
                            <textarea name="content" rows="4" class="form-control">{{ old('content') }}</textarea>
                        </div>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                        
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" rows="4" class="form-control">{{ old('content') }}</textarea>
                        </div>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif

                        <hr><button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> ADD POST</h1>
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
                    <h2 class="row justify-content-center">ADD POST</h2><hr>
                    <form action="/admin/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="slug-source">Title: </label>
                            <input type="text" value="" id="slug-source" class="form-control" name="title" />
                        </div>
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif

                        <div class="form-group">
                            <label for="slug-target">Slug: </label>
                            <input type="text" value="" id="slug-target" class="form-control" name="slug" />
                        </div>
                        @if ($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                        @endif

                        <div class="form-group">
                            <label for="slug-content">Content: </label>
                            <textarea name="content" rows="4" class="form-control" id="content" value="{{ old('content') }}" id="slug-content">{{ old('content') }}</textarea>
                        </div>
                        @if ($errors->has('content'))
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        @endif <br>

                        {{-- <button type="button" class="btn btn-dark" onClick="myFunction()">
                            Convert Title Into Slug
                        </button> --}}

                        <button type="submit" class="btn btn-dark">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>