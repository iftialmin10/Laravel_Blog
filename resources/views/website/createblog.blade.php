@extends('layouts.website')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

    <div class="box-body no-padding">
        <div class="row" style="margin-left:300px; ">
            <div class="col-lg-6" >
                <div class="box-header">
                    <h5 class="box-title">Create Post</h5>
                    <hr>
                </div>
                <form action="{{route('store_post')}}" method="POST" enctype="multipart/form-data">
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
                    

                    {{-- <div class="form-group">
                      <label>Select Tag</label>
                      @foreach($tags as $tag)
                      <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="tag[]" id="tag{{$tag->id}}" class="custom-control-input" value="{{$tag->id}}">
                        <label for="tag{{$tag->id}}" class="custom-control-label">{{$tag->name}}</label>
                      </div>
                      @endforeach
                    </div> --}}

              

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                      <textarea name="description" class="form-control" style="text-align: left; height: 160px;"
                      id="description" rows="4" placeholder="Enter description">{{old('description')}}</textarea>
                    </div>

                </div>
                <!-- /.box-body -->
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                </form><br>
            </div>
        </div>
    
    </div>
        </div>
      </div>
    </div>
</div>

@endsection