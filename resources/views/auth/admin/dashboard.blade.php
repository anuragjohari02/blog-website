@extends('layouts.master')

@section('content')

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0"> DASHBOARD</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                      {{-- <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard v1</li> --}}
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->
      
    {{-- <div class="container">        
        <table class="table table-hover mt-2">
            <thead>
              <tr>
                <th>Sno.</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Action</th>
              </tr>
            </thead>
              <tbody> 
                  @foreach ($posts as $post)
                      <tr>
                          <td>{{ $post->id }}</td>
                          <td><a href="/{{ $post->id }}/show" class="text-dark">{{ $post->title }}</a></td>
                          <td><a href="/{{ $post->slug }}/slug" class="text-dark">{{ $post->slug }}</a></td>
                          <td>
                              <a href="/{{ $post->id }}/edit" class="btn btn-dark btn-sm">Edit</a>

                              <form action="/{{ $post->id }}/delete" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                              </form>
                          </td>                
                      </tr>
                  @endforeach
              </tbody>  
        </table> --}}
        {{-- {{ $posts->links() }} --}}
    {{-- </div> --}}

@endsection