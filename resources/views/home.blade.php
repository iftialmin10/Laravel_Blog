@extends('layouts.website')
@section('content')

<div class="site-section bg-light">
  <div class="container">
    <div class="row align-items-stretch retro-layout-2">
      <div class="col-md-4">
        @foreach($firstpost2 as $post)
        <a href="{{route('post', ['slug'=>$post->slug])}}" class="h-entry mb-30 v-height gradient"
          style="background-image: url('/storage/post_image/{{$post->image}}');">
          <div class="text"> 
            <h2>{{$post->title}}</h2>
            <span class="date">{{$post->published_at->format('M d, Y')}}</span>
          </div>
        </a>
        @endforeach
      </div>
      <div class="col-md-4">
       
        <a href="{{route('post', ['slug'=>$middlepost[0]['slug']])}}" class="h-entry img-5 h-100 gradient"
          style="background-image: url('/storage/post_image/{{$middlepost[0]['image']}}');">
          <div class="text">
            <h2>{{$middlepost[0]['title']}}</h2>
            <span class="date">{{$middlepost[0]['published_at']->format('M d, Y')}}</span>
          </div>
        </a>
       
      </div>
      <div class="col-md-4">
        @foreach($lastpost2 as $post)
        <a href="{{route('post', ['slug'=>$post->slug])}}" class="h-entry mb-30 v-height gradient"
          style="background-image: url('/storage/post_image/{{$post->image}}');">

          <div class="text">
            <h2>{{$post->title}}</h2>
            <span class="date">{{$post->published_at->format('M d, Y')}}</span>
          </div>
        </a>
        @endforeach
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-12">
        <h2>Recent Posts</h2>
      </div>
    </div>
    <div class="row">
      @foreach($recentposts as $post)
      <div class="col-lg-4 mb-4">
        <div class="entry2">
           <a href="{{route('post', [$post->slug])}}"><img src="/storage/post_image/{{$post->image}}" height="200px" width="350px"></a>
          <div class="excerpt">
          <a href="{{route('category', [$post->category->id])}}"><span class="post-category text-white bg-info mb-3">{{$post->category->name}}</span></a>
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
      {{$recentposts->links()}};
    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">

    <div class="row align-items-stretch retro-layout">

      <div class="col-md-5 order-md-2">
        <a href="{{route('post', [$endpostright[0]['slug']])}}" class="hentry img-1 h-100 gradient"
          style="background-image: url('/storage/post_image/{{$endpostright[0]['image']}}');">
          <span class="post-category text-white bg-danger">{{$endpostright[0]['category']['name']}}</span>
          <div class="text">
            <h2>{{$endpostright[0]['title']}}</h2>
            <span>{{$endpostright[0]['published_at']->format('M d, Y')}}</span>
          </div>
        </a>
      </div>

      <div class="col-md-7">
        <a href="{{route('post', [$endposttop[0]['slug']])}}" class="hentry img-2 v-height mb30 gradient"
          style="background-image: url('/storage/post_image/{{$endposttop[0]['image']}}');">
          <span class="post-category text-white bg-success">{{$endposttop[0]['category']['name']}}</span>
          <div class="text text-sm">
            <h2>{{$endposttop[0]['title']}}</h2>
            <span>{{$endposttop[0]['published_at']->format('M d , Y')}}</span>
          </div>
        </a>
    
        <div class="two-col d-block d-md-flex">
          <a href="{{route('post', [$endpost1[0]['slug']])}}" class="hentry v-height img-2  gradient"
            style="background-image: url('/storage/post_image/{{$endpost1[0]['image']}}');"> 
            <span class="post-category text-white bg-primary">{{$endpost1[0]['category']['name']}}</span>
            <div class="text text-sm">
              <h2>{{$endpost1[0]['title']}}</h2>
              <span>{{$endpost1[0]['published_at']->format('M d , Y')}}</span>
            </div>
          </a>
         
          
          <a href="{{route('post', [$endpost2[0]['slug']])}}" class="hentry v-height img-2 ml-auto gradient"
            style="background-image: url('/storage/post_image/{{$endpost2[0]['image']}}');">
            <span class="post-category text-white bg-warning">{{$endpost2[0]['category']['name']}}</span>
            <div class="text text-sm">
              <h2>{{$endpost2[0]['title']}}</h2>
              <span>{{$endpost2[0]['published_at']->format('M d , Y')}}</span>
            </div>
          </a>
        </div>

      </div>
    </div>

  </div>
</div>

<div class="site-section bg-lightx">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-5">
        <div class="subscribe-1 ">
          <h2>Subscribe to our newsletter</h2>
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a
            explicabo, ipsam nostrum.</p>
          <form action="website" class="d-flex">
            <input type="text" class="form-control" placeholder="Enter your email address">
            <input type="submit" class="btn btn-primary" value="Subscribe">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection