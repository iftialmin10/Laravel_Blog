@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Category Details</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminpanel')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category List</a></li>
            <li class="breadcrumb-item active">{{$category->name}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="card card-primary card-outline">
  <div class="card-body">
    <div class="box">
      <div class="box-header with-border">
      <h3 class="box-title">{{$category->name}}</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <tbody>

            <tr>
              <th>Name</th>
              <td>{{$category->name}}</td>
            </tr>

            <tr>
              <th>Created At</th>
              <td>{{$category->created_at}}</td>
            </tr>

            <tr>
              <th>Description</th>
              <td>{{$category->description}}</td>
            </tr>

          </tbody>
        </table>
      </div>     
    </div>
  </div>
</div>
@endsection