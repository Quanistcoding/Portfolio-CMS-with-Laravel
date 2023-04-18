@extends('client._layout')
@section('content')


        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">{{$blog->title}}</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{$blog->category ? $blog->category->name : ''}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        <li><img src="{{asset('client/assets/img/icons/breadcrumb_icon01.png')}}" alt=""></li>
                        <li><img src="{{asset('client/assets/img/icons/breadcrumb_icon02.png')}}" alt=""></li>
                        <li><img src="{{asset('client/assets/img/icons/breadcrumb_icon03.png')}}" alt=""></li>
                        <li><img src="{{asset('client/assets/img/icons/breadcrumb_icon04.png')}}" alt=""></li>
                        <li><img src="{{asset('client/assets/img/icons/breadcrumb_icon05.png')}}" alt=""></li>
                        <li><img src="{{asset('client/assets/img/icons/breadcrumb_icon06.png')}}" alt=""></li>
                    </ul>
                </div>
            </section>
            <!-- breadcrumb-area-end -->


            <!-- blog-details-area -->
            <section class="standard__blog blog__details">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="standard__blog__post">
                                <div class="standard__blog__thumb">
                                    <img src="{{asset($blog->image_url)}}" alt="">
                                </div>
                                <div class="blog__details__content services__details__content">
                                    <ul class="blog__post__meta">
                                        <li><i class="fal fa-calendar-alt"></i> {{Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM Do YYYY');}}</li>
                                        <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                                        <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                                    </ul>
                                    <h2 class="title">{{$blog->title}}</h2>
                                    <div>
                                        {!!$blog->description!!}
                                    </div>
                                </div>
                                <div class="blog__details__bottom">
                                    <ul class="blog__details__tag">
                                        <li class="title">Tag:</li>
                                        <li class="tags-list">
                                            @foreach(explode(",",$blog->tags) as $tag)
                                              <a href="#">{{$tag}}</a>
                                            @endforeach
                                        </li>
                                    </ul>
                                    <ul class="blog__details__social">
                                        <li class="title">Share :</li>
                                        <li class="social-icons">
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <a href="#"><i class="fab fa-twitter-square"></i></a>
                                            <a href="#"><i class="fab fa-linkedin"></i></a>
                                            <a href="#"><i class="fab fa-pinterest"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog__next__prev">
                                    <div class="row justify-content-between">
                                        <div class="col-xl-5 col-md-6">
                                            @if($previousPost != null)
                                                <div class="blog__next__prev__item">
                                                    <h4 class="title">Previous Post</h4>
                                                    <div class="blog__next__prev__post">
                                                        <div class="blog__next__prev__thumb">
                                                            <a href="{{route('client.blog.detail',$previousPost->id)}}"><img src="{{asset($previousPost->image_url)}}" alt=""></a>
                                                        </div>
                                                        <div class="blog__next__prev__content">
                                                            <h5 class="title"><a href="{{route('client.blog.detail',$previousPost->id)}}">{{$previousPost->title}}</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif                                            
                                        </div>
                                        <div class="col-xl-5 col-md-6">
                                            @if($nextPost != null)
                                                <div class="blog__next__prev__item next_post text-end">
                                                    <h4 class="title">Next Post</h4>
                                                    <div class="blog__next__prev__post">
                                                        <div class="blog__next__prev__thumb">
                                                            <a href="{{route('client.blog.detail',$nextPost->id)}}"><img src="{{asset($nextPost->image_url)}}" alt=""></a>
                                                        </div>
                                                        <div class="blog__next__prev__content">
                                                            <h5 class="title"><a href="{{route('client.blog.detail',$nextPost->id)}}">{{$nextPost->title}}</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif 
                                        </div>
                                    </div>
                                </div>
                               
                                @include('client/blog/components/_comment', ['post_id' => $blog->id])
                            </div>
                        </div>
                        <div class="col-lg-4">
                           @include('client/blog/components/_aside')
                        </div>
                    </div>
                </div>
            </section>
            <!-- blog-details-area-end -->


          

        </main>
        <!-- main-area-end -->


@endsection