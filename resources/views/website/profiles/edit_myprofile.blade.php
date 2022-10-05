@extends('layouts.website')
@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-7">
        <div class="card">
          <div class="card-header">
            <h5 class="m-0">Update Profile</h5>
          </div>
          <div class="card-body">
            @include('inc.messages')
            <form action="{{route('update_myprofile',[$user->id])}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              @include('inc.messages')
              <div class="box-body">
                <div class="row">
                  <div class="col-5">
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
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label>select Image</label> 
                      <input type="file" value="" name="cover_pic" class="form-control" vlaue="">
                    </div>
                    

              

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                      <textarea name="description" class="form-control" style="text-align: left;"
                      id="description" rows="4" placeholder="Enter description">{{$user->description}}</textarea>
                  </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

  
              <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
              </form>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
      <div class="col-lg-5">
        <div class="card">
          <div class="card-header">
            <h5 class="m-0">Profile</h5>
          </div>
          <div class="card-body">
            @if($user->image == 'noimage')
            <img src="/storage/user_image/noimage.jpg" width="250px" height="200px"><br> 
            @else
            <img src="/storage/user_image/{{$user->image}}" width="300px" height="200px"><br>
            @endif

            <h4>{{$user->name}}</h4>
            <h5>{{$user->email}}</h5>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

@endsection


