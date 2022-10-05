@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Tags</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminpanel')}}">Home</a></li>
            <li class="breadcrumb-item active">Tags</li>
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
                <h5 class="box-title">Tags List 
                  <a href="{{route('tag.create')}}" style="float:right;" 
                        class="btn btn-primary btn-sm">Create Tags</a></h5>
              </div>
            @include('inc.messages')
            <div class="box-body no-padding">
                <table class="table table-striped">
                  <tbody>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Tag Count</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                 @if(count($tags)>0)
                  @foreach($tags as $tag)
                    <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->slug}}</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                    <td>{{$tag->created_at}}</td>

                    <td class="d-flex">
                      
                      <a href="{{route('tag.edit',[$tag->id])}}" class="btn btn-sm btn-success mr-1">
                      <i class="fas fa-edit"></i></a>

                      <form action="{{route('tag.destroy', [$tag->id])}}" method="POST" class="mr-1">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-sm btn-danger" 
                          onclick="return confirm('Do you want to delete {{$tag->name}}?')"> <i class="fas fa-trash"></i></button>
                      </form>

                    </td>
                    </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="6"><h4 class="text-center" style="color:red;">No tags found!!</h4></td>
                    </tr>
                  @endif

                </tbody></table>
              </div>
        </div>
      </div>
    </div>
</div>
@endsection