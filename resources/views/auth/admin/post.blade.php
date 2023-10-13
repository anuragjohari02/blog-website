@extends('layouts.master')

@section('content')

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0"> Posts List</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        {{-- {{ Breadcrumbs::render('post') }} --}}

                        {{-- {{ Breadcrumbs::render('post', $post) }} --}}

                      <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                      {{-- <li class="breadcrumb-item active"><a href="/dashboard">Back</a></li> --}}
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->
      
    <div class="container">        
        <table class="table table-hover mt-2 mb-5">
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
                          <td><a href="/admin/{{ $post->id }}/show" class="text-dark">{{ $post->title }}</a></td>
                          <td>{{ $post->slug }}</td>
                          <td><a href="/admin/{{ $post->id }}/edit" class="btn btn-dark btn-sm">Edit</a>

                            <form action="/admin/{{ $post->id }}/delete" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete" data-postid="{{ $post->id }}">Delete</button>
                            </form>
                            
                          </td>                
                      </tr>
                  @endforeach
              </tbody>  
        </table>
        {{ $posts->links() }}
    </div>


    <!-- Modal -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
        <div class="modal-dialog" role="document"> 
            <div class="modal-content"> 
                <div class="modal-header bg-red" style="display: inline-block"> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times; </span>
                    </button> 
                    <h4 class="modal-title" id="myModal Label">Delete Confirmation</h4> 
                </div> 
                <form action="/admin/{{ $post->id }}/delete" method="POST"> 
                    @csrf 
                    @method('DELETE') 
                    <div class="modal-body"> 
                        <h4 class="text-center">Do you really want to delete?</h4>
                        <input type="hidden" name="category_id" id="post_id" value="">
                        {{-- @include('category.form')  --}}
                    </div> 
                    <div class="modal-footer"> 
                        <button type= "button" class="btn btn-default" data-dismiss="modal">No, Cancel</button> 
                        <button type="submit" class="btn btn-primary">Yes, Delete</button> 
                    </div>
                </form> 
            </div> 
        </div>
    </div>

@endsection


