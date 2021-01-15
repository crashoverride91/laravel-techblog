@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a></li>
            <li class="breadcrumb-item active ">User Profile</li>
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
                                <h3 class="card-title">User profile</h3>
                              <a href="{{route('user.index')}}" class="btn btn-primary">Go back to User List</a>
                          </div>
                        </div>

                        
                        
                          
                          <div class="card-body p-0">
                            <div class="row">
                              <div class="col-12 col-lg-7 offset-lg-1">
                                <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                                  @csrf 
                                  @include('includes.errors')
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name">User Name </label>
                                                    <input type="name" name="name" class="form-control" id="name" placeholder="Enter name" value="{{$user->name}}">
                                                </div>
            
                                                <div class="form-group">
                                                    <label for="email">User email </label>
                                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{$user->email}}">
                                                </div>
            
                                                <div class="form-group">
                                                    <label for="password">User password <small class="text-info">Enter password if you want change</small> </label>
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="image">User image </label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                                        <label for="exampleInputFile" class="custom-file-label" >Choose File</label>
                                                    </div>
                                                    
                                                </div>
            
            
                                                <div class="form-group">
                                                    <label for="description">User description</label>
                                                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter your profile description">{{$user->description}}</textarea>
                                                </div>
                                            </div>
                                      </div>
                                   

                                    <div class="footer">
                                      <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                  </div>
                                </form>
                    
                              </div>

                              <div class="col-lg-4">
                                  <div class="card">
                                      <div class="card-body text-center">
                                            <div style="height:50%;width:50%" class="mb-2 m-auto">
                                                <img src="{{asset($user->image)}}" alt="" class="img-fluid rounded-circle ">
                                            </div>
                                            <div class="mt-2">
                                                    <h5>{{$user->name}}</h5>
                                                    <p>{{$user->email}}</p>
                                            </div>

                                      </div>
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