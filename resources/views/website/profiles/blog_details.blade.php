@extends('layouts.website')
@section('content')

<div class="card card-primary card-outline">
    <div class="card-body">
      <div class="box">
        <div class="box-header with-border">
        @include('inc.messages')
        <h3 class="box-title">{{$post[0]['title']}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Title</th>
                <td>{{$post[0]['title']}}</td>
              </tr>
              
              <tr>
                <th>Publish Date</th>
                <td>{{$post[0]['published_at']}}</td>
              </tr>

              <tr>
                <th>Author</th>
                  <td> 
                    {{$post[0]['User']['name']}}
                  </td>
              </tr>

              <tr>
                <th>Category</th>
                <td> {{$post[0]['category']['name']}}</td>
              </tr>

              <tr>
                <th>Image</th>
                <td>
                  @if($post[0]['image'] == 'noimage.jpg')
                  <img src="/storage/post_image/noimage.jpg" width="600px" height="400px"><br> 
                  @else
                  <img src="/storage/post_image/{{$post[0]['image']}}" width="600px" height="400px"><br>
                  @endif
                </td>
              </tr>
              
              <tr>
                <th>Description</th>
                <td>{{$post[0]['description']}}</td>
              </tr>
            </tbody>
          </table>
          <div class="row">
            <div class="col-sm-1"> 
                <a href="{{route('edit_mypost', [$post[0]['slug']])}}" class="btn btn-info">Update</a>&ensp;&ensp;
            </div>

            <div class="col-sm-1"> 
                <form action="{{route('delete_mypost', [$post[0]['id']])}}" method="POST" >
                    @method('DELETE')
                    @csrf
                   <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                   </form>
            </div>
          </div>
          
        </div>     
      </div>
    </div>
  </div>
@endsection