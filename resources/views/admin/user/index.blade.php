@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">User List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item active">User List</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                          <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">user List</h3>
                              <a href="{{route('user.create')}}" class="btn btn-primary">Create user</a>
                          </div>
          
                        {{--   <div class="card-tools">
                            <ul class="pagination pagination-sm float-right">
                              <li class="page-item"><a class="page-link" href="#">«</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                          </div> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table">
                            <thead>
                              <tr>
                                <th style="width: 10px">#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                {{-- <th></th> --}}
                                <th style="width:150px">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if($users->count())
                              @foreach($users as $user)
                              <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                  <div style="max-width:70px; max-height:70px; overflow:hidden">
                                    <img src="{{asset($user->image)}}" class="img-fluid" alt="">
                                  </div>
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                
                                
                                <td class="d-flex" style="width:150px">
                                  <a href="{{route('user.edit', [$user->id])}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                  <form action="{{route('user.destroy',[$user->id])}}" class="mr-1" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"  class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i></button>
                                  </form>
                                </td>
                              </tr>
                              @endforeach

                              @else 

                              <tr>
                                <td colspan="5">
                                  <h5 class="text-center">No categories found.</h5>
                                </td>
                              </tr>

                            @endif
                              
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
           
        </div><!-- /.container-fluid -->
</div>
@endsection