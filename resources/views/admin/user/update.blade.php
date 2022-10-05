@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Update User</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminpanel')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a></li>
            <li class="breadcrumb-item active">Update User</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

    <div class="box-body no-padding">
        <div class="row" style="margin-left:300px; ">
            <div class="col-lg-6" >
                <div class="box-header">
                    <h5 class="box-title">Update User</h5>
                </div>
                @include('inc.messages')
                <form action="{{route('user.update', [$user->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                  @include('inc.messages')

                    <div class="form-group">
                    <label>User Name</label>
                    <input name="user_name" value="{{$user->name}}" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input name="user_email" value="{{$user->email}}" class="form-control" type="email">
                      </div>

                    <div class="form-group">
                      <label>Password<small class="text-info">(If you want to change.)</small></label>
                      <input name="user_pass" class="form-control" type="password" placeholder="password">
                    </div>

                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input name="confirm_pass" class="form-control" type="password" placeholder="password">
                    </div>

                    <div class="form-group">
                      <label>User Type</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="user_type" value="admin" @if($user->user_type == 'admin') checked @endif>
                        <label class="form-check-label">Admin</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="user_type" value="user" @if($user->user_type == 'user') checked @endif>
                        <label class="form-check-label">User</label>
                      </div>
                    </div>


                    <div class="form-group">
                      <label>select Image</label> 
                      <input type="file" value="{{$user->image}}" name="cover_pic" class="form-control" vlaue="">
                    </div>
                    

              

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                      <textarea name="description" class="form-control" style="text-align: left;"
                      id="description" rows="4" placeholder="Enter description">{{$user->description}}</textarea>
                    </div>

                </div>
                <!-- /.box-body -->
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
                </form>
            </div>
        </div>
    
    </div>
        </div>
      </div>
    </div>
</div>

@endsection