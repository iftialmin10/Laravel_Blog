@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Post</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminpanel')}}">Home</a></li>
            <li class="breadcrumb-item active">Post</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="box-header">
                <h5 class="box-title">Post List 
                    <a href="{{route('post.create')}}" style="float:right;" 
                        class="btn btn-primary btn-sm">Create Post</a></h5>
              </div>
            @include('inc.messages')
            <div class="box-body no-padding">
                <table class="table table-striped">
                  <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Slug</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Author</th>
                    <th>Published At</th>
                    <th>Action</th>
                  </tr>
                  @if(count($posts)>0)
                  @foreach($posts as $post)
                  <tr>
                    <td>{{$post->id}}</td>
                  <td><a href="{{route('post.show', [$post->id])}}" style="color:black">
                    <strong>{{$post->title}}</strong></a></td>
                    <td>
                      @if($post->image == 'noimage.jpg')
                      <img src="/storage/post_image/noimage.jpg" width="120px" height="80px"><br> 
                      @else
                      <img src="/storage/post_image/{{$post->image}}" width="120px" height="80px"><br>
                      @endif
                    </td>
                    <td>{{$post->slug}}</td>
                    <td>
                      @if($post->category->name)
                      {{$post->category->name}}
                      @else 
                      <h5>No Category!</h5>
                      @endif 
                    </td>
                    <td>
                      @foreach($post->tags as $tag)
                        <span class="badge badge-primary">{{$tag->name}}</span>
                      @endforeach
                    </td>

                    <td>
                      @if($post->user)
                      {{$post->User->name}}
                      @else 
                      <span>User removed!</span>
                      @endif
                    </td>
                    
                    <td>{{$post->published_at}}</td>

                  <td class="d-flex">
                    
                    <a href="{{route('post.edit',[$post->id])}}" class="btn btn-sm btn-success mr-1">
                    <i class="fas fa-edit"></i></a>

                    <form action="{{route('post.destroy', [$post->id])}}" method="POST" class="mr-1">
                     @method('DELETE')
                     @csrf
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i></button>
                    </form>

                  </td>
                  
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="8"><h4 class="text-center" style="color:red;">No post found!!</h4></td>
                  </tr>
                @endif

                </tbody></table>
              </div>
        </div>
      </div>
    </div>
</div>
@endsection