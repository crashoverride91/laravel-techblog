@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0 text-dark">Edit  Setting</h1>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
              <li class="breadcrumb-item active ">Edit Setting</li>
              </ol>
          </div>
        </div>
    </div>
</div>

{{-- Main Content --}}
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                          <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Edit Site Setting </h3>
                          </div>
                        </div>

                        
                      
                          <div class="card-body p-0">
                            <div class="row">
                              <div class="col-12 col-lg-8 offset-lg-2  col-md-8 offset-md-2">
                                <div class="card-body">
                                  <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                        
                                    @include('includes.errors')
                                    <div class="form-group">
                                      <label for="title">Post title </label>
                                      <input type="name" name="title" value="" class="form-control" placeholder="Enter title">
                                    </div>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-8">
                                          <label for="image">Image</label>
                                          <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                          </div>
                                        </div>

                                        <div class="col-4 text-right">
                                          <div style="max-width: 100px; max-height: 100px; overflow:hidden; margin-left:auto">
                                            <img src="" class="img-fluid" alt="">
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="description">Description</label>
                                      <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter description"></textarea>
                                    </div>

                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary">Update setting</button>
                                    </div>
                                  </form>
                                </div>
                    
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
  /*     $('#description').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 300
      });  */
   </script>
  
@endsection 