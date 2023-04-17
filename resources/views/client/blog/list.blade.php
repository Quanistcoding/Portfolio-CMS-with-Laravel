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
                                <h2 class="title">Recent Article</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
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


            <!-- blog-area -->
            <section class="standard__blog">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            @foreach($blogs as $blog)
                            <div class="standard__blog__post">
                                <div class="standard__blog__thumb">
                                    <a href="{{route('client.blog.detail',$blog->id)}}"><img src="{{asset($blog->image_url)}}" alt=""></a>
                                    <a href="{{route('client.blog.detail',$blog->id)}}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                                </div>
                                <div class="standard__blog__content">
                                    <div class="blog__post__avatar">
                                        <div class="thumb"><img src="{{asset($author->image_url)}}" alt=""></div>
                                        <span class="post__by">By : <a href="{{route('client.about')}}">{{$author->last_name}}</a></span>
                                    </div>
                                    <h2 class="title"><a href="{{route('client.blog.detail',$blog->id)}}">{{$blog->title}}</a></h2>
                                    <p>{!! Str::words($blog->description,50) !!}</p>
                                    <ul class="blog__post__meta">
                                        <li><i class="fal fa-calendar-alt"></i> {{ Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }}</li>
                                        <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                                        <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                                    </ul>
                                </div>
                            </div>

                            @endforeach
                            <div class="pagination-wrap">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-left"></i></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <aside class="blog__sidebar">
                                <div class="widget">
                                    <form action="#" class="search-form">
                                        <input type="text" placeholder="Search">
                                        <button type="submit"><i class="fal fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Recent Blog</h4>
                                    <ul class="rc__post">
                                        @php($max = $blogCount < 5 ? $blogCount : 5)
                                        @for($i = 0; $i < $max; $i++)
                                            <li class="rc__post__item">
                                                <div class="rc__post__thumb">
                                                    <a href="{{route('client.blog.detail',$blogs[$i]->id)}}"><img src="{{asset($blogs[$i]->image_url)}}" alt=""></a>
                                                </div>
                                                <div class="rc__post__content">
                                                    <h5 class="title"><a href="{{route('client.blog.detail',$blogs[$i]->id)}}">{{ $blogs[$i]->title}}</a></h5>
                                                    <span class="post-date"><i class="fal fa-calendar-alt"></i> {{ 
                                                              $blogs[$i] ? 
                                                              Carbon\Carbon::parse($blogs[$i]->created_at)->toFormattedDateString() :
                                                              ''                                                    
                                                    }}</span>
                                                </div>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- blog-area-end -->

        </main>
        <!-- main-area-end -->


@endsection