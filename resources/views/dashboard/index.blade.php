@extends('layouts.global')

@section('title')
    Dashboard
@endsection

@section('content')
  @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
  @elseif (session('statusdel'))
    <div class="alert alert-danger">
      {{ session('statusdel') }}
    </div>
  @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- Main row -->
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Table User</h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Status Auth</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                @if ($user->status == 'ACTIVE')
                                    <td><span class="badge bg-success">{{ $user->status }}</span></td>
                                @elseif ($user->status == 'INACTIVE')
                                    <td><span class="badge bg-danger">{{ $user->status }}</span></td>
                                @endif
                                
                                @if ($user->status_account == 'online')
                                    <td><span class="badge bg-warning">{{  $user->status_account }}</span></td>
                                @elseif ($user->status_account == 'offline')
                                    <td><span class="badge bg-danger">{{  $user->status_account }}</span></td>
                                @else
                                  <td><span class="badge bg-danger">offline</span></td>
                                @endif
                                <td>
                                    <a href="{{ route('auth.edit', [$user->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('auth.delete', $user->id)}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <button onclick="return confirm('Are you sure??')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection