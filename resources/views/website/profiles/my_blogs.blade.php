@extends('layouts.website')
@section('content')
<div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          @include('inc.messages')
          <h2>My Posts</h2>
          <hr>
        </div>
        
      </div>
      <div class="row">
        @if(count($posts)>0)
            @foreach($posts as $post)
            <div class="col-lg-4 mb-4">
            <div class="entry2">
                <a href="{{route('view_post', [$post->slug])}}"><img src="/storage/post_image/{{$post->image}}" height="200px" width="350px"></a>
                <div class="excerpt">
                <a href="{{route('category', [$post->category->id])}}"><span class="post-category text-white bg-secondary mb-3">{{$post->category->name}}</span></a>
                <h2><a href="{{route('view_post', [$post->slug])}}">{{$post->title}}</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                    <span>{{$post->published_at->format('M d, Y')}}</span>
                    </div>
                </div>
            </div>
            </div>
            @endforeach
        @else 
            <div colspan="8"><h4 class="text-center" style="color:red">No post found!!</h4></div>   
        @endif     

      </div>
      <div class="row text-center pt-5 border-top">
        {{$posts->links()}}
      </div>
    </div>
  </div>
@endsection