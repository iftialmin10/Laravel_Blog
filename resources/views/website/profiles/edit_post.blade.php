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
                    <h5 class="box-title">Update Post</h5>
                </div>
                <form action="{{route('update_mypost', [$post[0]['id']])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                  <div class="form-group">
                    <label>Post Name</label>
                    <input name="post_name" value="{{$post[0]['title']}}" class="form-control" type="text" placeholder="name">
                    </div>


                    <div class="form-group">
                      <label>Category</label>
                      <select name="post_category" id="post_category" class="form-control">
                        <option selected style="display: none">Select category</option>
                        @foreach($categories as $post_category)
                        <option value="{{$post_category->id}}" @if($post[0]['category_id'] == $post_category->id) selected @endif>
                          {{$post_category->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group row"> 
                      <div class="col-sm-8">
                        <label>select Image</label> 
                        <input type="file" name="cover_pic" class="form-control">
                      </div>
                      <div class="col-sm-4">
                        @if($post[0]['image']=='noimage.jpg')
                        <img src="/storage/post_image/noimage.jpg" width="80px" height="70px" 
                            style="margin-left: 30px; margin-top: 10px;">
                        @else
                        <img src="/storage/post_image/{{$post[0]['image']}}" width="80px" height="70px" 
                            style="margin-left: 30px; margin-top: 10px;">
                        @endif
                      </div>
                    </div>

                    {{-- <div class="form-group">
                      <label>Select Tag</label>
                      @foreach($tags as $tag)
                      <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="tag[]" id="tag{{$tag->id}}" class="custom-control-input" value="{{$tag->id}}"
                      @foreach($post->tags as $t)
                        @if($tag->id == $t->id)
                          checked
                        @endif
                      @endforeach>

                        <label for="tag{{$tag->id}}" class="custom-control-label">{{$tag->name}}</label>
                      </div>
                      @endforeach
                    </div> --}}
                    

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" style="text-align: left;" class="form-control" id="description" 
                      rows="4" placeholder="Enter description">{{$post[0]['description']}}
                      </textarea>
                    </div>
                </div>
                <!-- /.box-body -->
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Post</button>
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