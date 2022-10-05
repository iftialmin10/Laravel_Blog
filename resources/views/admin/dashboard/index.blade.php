 @extends('layouts.admin')
 @section('content')
 
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Starter Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminpanel')}}">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h5 class="m-0">Post Information</h5>
            </div>
            <div class="card-body">
              <h4>Total Post:{{$posts}}</h4>
              <a href="{{route('post.index')}}" style="color: #3fb93d;"><h5>View</h5></a>
            </div>
          </div>

          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Category Information</h5>
            </div>
            <div class="card-body">
              <h4>Total Category:{{$categories}}</h4>
              <a href="{{route('category.index')}}" style="color: #3fb93d;"><h5>View</h5></a>
            </div>
          </div><!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h5 class="m-0">User Information</h5>
            </div>
            <div class="card-body">
              <h4>Total User: {{$users}}</h4>
              <a href="{{route('user.index')}}" style="color: #3fb93d;"><h5>View</h5></a>
            </div>
          </div>

          {{-- <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Featured</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Special title treatment</h6>
            </div>
          </div> --}}
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

 @endsection