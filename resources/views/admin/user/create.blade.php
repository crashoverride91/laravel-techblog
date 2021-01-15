@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create  user</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a></li>
            <li class="breadcrumb-item active ">Create user</li>
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
                                <h3 class="card-title">Create user</h3>
                              <a href="{{route('user.index')}}" class="btn btn-primary">Go back to User List</a>
                          </div>
                        </div>

                        
                        
                          
                          <div class="card-body p-0">
                            <div class="row">
                              <div class="col-12 col-lg-6 offset-lg-3  col-md-8 offset-md-2">
                                <form action="{{route('user.store')}}" method="POST">
                                  @csrf 
                                  <div class="card-body">
                                    @include('includes.errors')
                                    <div class="form-group">
                                      <label for="name">User Name </label>
                                      <input type="name" name="name" class="form-control" id="name" placeholder="Enter name">
                                    </div>

                                    <div class="form-group">
                                      <label for="email">User email </label>
                                      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                                    </div>

                                    <div class="form-group">
                                      <label for="password">User password </label>
                                      <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
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