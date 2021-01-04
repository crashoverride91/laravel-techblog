@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item active">Category List</li>
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
                                <h3 class="card-title">Category List</h3>
                              <a href="{{route('category.create')}}" class="btn btn-primary">Create category</a>
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
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Post Count</th>
                                <th>Progress</th>
                                <th style="width: 40px">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1.</td>
                                <td>Update software</td>
                                <td>Update software</td>
                                <td>
                                  <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                  </div>
                                </td>
                                <td><span class="badge bg-danger">55%</span></td>
                              </tr>
                              {{-- <tr>
                                <td>2.</td>
                                <td>Clean database</td>
                                <td>
                                  <div class="progress progress-xs">
                                    <div class="progress-bar bg-warning" style="width: 70%"></div>
                                  </div>
                                </td>
                                <td><span class="badge bg-warning">70%</span></td>
                              </tr>
                              <tr>
                                <td>3.</td>
                                <td>Cron job running</td>
                                <td>
                                  <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar bg-primary" style="width: 30%"></div>
                                  </div>
                                </td>
                                <td><span class="badge bg-primary">30%</span></td>
                              </tr>
                              <tr>
                                <td>4.</td>
                                <td>Fix and squish bugs</td>
                                <td>
                                  <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar bg-success" style="width: 90%"></div>
                                  </div>
                                </td>
                                <td><span class="badge bg-success">90%</span></td>
                              </tr> --}}
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