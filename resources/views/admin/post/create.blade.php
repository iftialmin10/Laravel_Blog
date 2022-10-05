@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Create Post</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminpanel')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post List</a></li>
            <li class="breadcrumb-item active">Create Post</li>
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
                    <h5 class="box-title">Add to Post</h5>
                </div>
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                  @include('inc.messages')
                    <div class="form-group">
                    <label>Post Name</label>
                    <input name="post_name" value="{{old('post_name')}}" class="form-control" type="text" placeholder="name">
                    </div>


                    <div class="form-group">
                      <label>Category</label>
                      <select name="post_category" id="post_category" class="form-control">
                        <option selected style="display: none">Select category</option>
                        @foreach($categories as $post_category)
                        <option value="{{$post_category->id}}">{{$post_category->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>select Image</label> 
                      <input type="file"  name="cover_pic" class="form-control">
                    </div>
                    

                    <div class="form-group">
                      <label>Select Tag</label>
                      @foreach($tags as $tag)
                      <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="tag[]" id="tag{{$tag->id}}" class="custom-control-input" value="{{$tag->id}}">
                        <label for="tag{{$tag->id}}" class="custom-control-label">{{$tag->name}}</label>
                      </div>
                      @endforeach
                    </div>

              

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                      <textarea name="description" class="form-control" style="text-align: left;"
                      id="description" rows="4" placeholder="Enter description">{{old('description')}}</textarea>
                    </div>

                </div>
                <!-- /.box-body -->
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
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