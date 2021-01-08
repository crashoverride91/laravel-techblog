@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post List</a></li>
            <li class="breadcrumb-item active ">Create post</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

{{-- Main Content --}}
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                          <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Create post</h3>
                              <a href="{{route('post.index')}}" class="btn btn-primary">Go back to post List</a>
                          </div>
                        </div>

                        
                        
                          
                          <div class="card-body p-0">
                            <div class="row">
                              <div class="col-12 col-lg-8 offset-lg-2  col-md-8 offset-md-2">
                                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                                  @csrf 
                                  <div class="card-body">
                                    @include('includes.errors')
                                    <div class="form-group">
                                      <label for="title">Post title </label>
                                      <input type="name" name="title" value="{{old('title')}}" class="form-control" placeholder="Enter title">
                                    </div>

                                    <div class="form-group">
                                      <label for="category">Post Category </label>
                                      
                                      <select name="category" id="category" class="form-control" >
                                        <option value="" style="display:none" selected>Select Category</option>
                                        @foreach ($categories as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>

                                    <div class="form-group">
                                      <label for="image">Image</label>
                                        <div class="custom-file">
                                          <input type="file" name="image" class="custom-file-input" id="image">
                                          <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex flex-wrap">
                                        @foreach ($tags as $tag)
                                          <div class="form-check" style="margin-right:20px">
                                            <input class="form-check-input" name="tags[]" type="checkbox" id="tag{{$tag->id}}" value="{{$tag->id}}">
                                            <label class="form-check-label" for="tag{{$tag->id}}">{{$tag->name}}</label>
                                          </div>
                                        @endforeach
                                    </div>

                                

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Description</label>
                                    <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter description" value="{{old('description')}}"></textarea>
                                    </div>

                                    <div class="footer">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                  </div>
                                </form>
                    
                              </div>
                            </div>
                          </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
           
        </div><!-- /.container-fluid -->
</div>
@endsection

@section('style')
  <link rel="stylesheet" href="{{asset('/admin/css/summernote-bs4.min.css')}}">
@endsection 

@section('script')
   <script src="{{asset('admin/js/summernote-bs4.min.js')}}"></script>
   <script>
      $('#description').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 300
      });
   </script>
  
@endsection 