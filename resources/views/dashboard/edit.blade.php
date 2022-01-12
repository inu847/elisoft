@extends('layouts.global')

@section('title')
    Edit {{ $user->username }}
@endsection

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Quick Example</h3>
  </div>
  <form action="{{ route('auth.update', [$user->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" value="{{$user->username}}" id="username" placeholder="Enter email" name="username">
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" value="{{$user->email}}" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="">Status</label>
        <div class="row">
          <div class="col-md-1">
            <label for="">Active</label>
            <input type="radio" value="{{ $user->status }}" name="status" {{ ($user->status == "ACTIVE")? "checked" : ""}}>
          </div>
          <div class="col-md-1">
            <label for="">Inactive</label>
            <input type="radio" value="{{ $user->status }}" name="status" {{ ($user->status == "INACTIVE")? "checked" : ""}}>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      </div>
      
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection