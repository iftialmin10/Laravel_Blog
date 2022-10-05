@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">{{$post->name}} Details</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminpanel')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post List</a></li>
            <li class="breadcrumb-item active">{{$post->title}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="card card-primary card-outline">
    <div class="card-body">
      <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">{{$post->title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Title</th>
                <td>{{$post->title}}</td>
              </tr>
              
              <tr>
                <th>Publish Date</th>
                <td>{{$post->published_at}}</td>
              </tr>

              <tr>
                <th>Author</th>
                  <td> 
                    @if($post->user)
                    {{$post->User->name}}
                    @else 
                    <span>User removed!</span>
                    @endif
                  </td>
              </tr>

              <tr>
                <th>Category</th>
                <td> {{$post->category->name}}</td>
              </tr>

              <tr>
                <th>Tags</th>
                <td>
                  @foreach($post->tags as $tag)
                    <span class="badge badge-primary">{{$tag->name}}</span>
                  @endforeach
                </td>
              </tr>

              <tr>
                <th>Image</th>
                <td>
                  @if($post->image == 'noimage.jpg')
                  <img src="/storage/post_image/noimage.jpg" width="600px" height="400px"><br> 
                  @else
                  <img src="/storage/post_image/{{$post->image}}" width="600px" height="400px"><br>
                  @endif
                </td>
              </tr>
              
              <tr>
                <th>Description</th>
                <td>{{$post->description}}</td>
              </tr>
            </tbody>
          </table>
        </div>     
      </div>
    </div>
  </div>
@endsection