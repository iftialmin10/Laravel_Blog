@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Welcome {{$user->name}}</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminpanel')}}">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="card card-primary card-outline">
    <div class="card-body">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Profile Information</h3>
        </div>
        @include('inc.messages')
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody>

              <tr>
                <th>Image</th>
                <td>
                  @if($user->image == 'noimage')
                  <img src="/storage/user_image/noimage.jpg" width="250px" height="200px"><br> 
                  @else
                  <img src="/storage/user_image/{{$user->image}}" width="250px" height="200px"><br>
                  @endif
                </td>
              </tr>

              <tr>
                <th>Name</th>
                <td>{{$user->name}}</td>
              </tr>
              
              <tr>
                <th>Email</th>
                <td>{{$user->email}}</td>
              </tr>

              <tr>
                <th>User Type</th>
                <td>{{$user->user_type}}</td>
              </tr>

              <tr>
                <th>Description</th>
                <td>{{$user->description}}</td>
              </tr>

              <tr>
                <th>Created Date</th>
                <td>{{$user->created_at->format('M d, Y')}}</td>
              </tr>
            </tbody>
          </table>
          <a href="{{route('edit_profile', [$user->id])}}" class="btn btn-success">Update Profile</a>
        </div>     
      </div>
    </div>
  </div>
@endsection