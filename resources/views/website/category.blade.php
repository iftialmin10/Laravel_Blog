@extends('layouts.website')
@section('content')
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Category</span>
            <h3>{{$category[0]['name']}}</h3>
            <p>{{$category[0]['description']}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-white">
      <div class="container">
        <div class="row">
          @foreach($posts as $post)
          <div class="col-lg-4 mb-4">
            <div class="entry2">
               <a href="{{route('post', [$post->slug])}}"><img src="/storage/post_image/{{$post->image}}" height="200px" width="350px"></a>
              <div class="excerpt">

                @if($post->category->name)
                <span class="post-category text-white bg-info mb-3">{{$post->category->name}}</span>
                @else 
                <span class="post-category text-white bg-secondary mb-3">No Category!</span>
                @endif  
    
              <h2><a href="single.html">{{$post->title}}</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                 
                @if($post->user)
                  @if($post->user->image == 'noimage')
                  <figure class="author-figure mb-0 mr-3 float-left"><a href="{{route('bloger_details', [$post->user->id])}}"><img src="/storage/user_image/noimage.jpg" alt="Image" class="img-fluid"></a></figure>
                  @else 
                  <figure class="author-figure mb-0 mr-3 float-left"><a href="{{route('bloger_details', [$post->user->id])}}"><img src="/storage/user_image/{{$post->user->image}}" alt="Image" class="img-fluid"></a></figure>
                  @endif
                @else 
                <figure class="author-figure mb-0 mr-3 float-left"><img src="/storage/user_image/unknownuser.png" alt="Image" class="img-fluid"></figure>
                @endif
    
    
                @if($post->user)
                <span class="d-inline-block mt-1">By <a href="{{route('bloger_details', [$post->user->id])}}">{{$post->user->name}}</a></span>
                @else
                <span class="d-inline-block mt-1">By <a href="#">user has been removed.</a></span>
                @endif
                
                <span>&nbsp;-&nbsp; {{$post->published_at->format('M d, Y')}}</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
     
                <p> <a href="{{route('post', [$post->slug])}}">Read More</a></p>
    
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="row text-center pt-5 border-top">
              {{$posts->links()}}
            </div>
          </div>
      </div>
    </div>
  </div>
  
@endsection
