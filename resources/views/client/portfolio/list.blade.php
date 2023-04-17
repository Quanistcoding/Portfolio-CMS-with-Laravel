@extends('client._layout')
@section('content')

<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Case Study</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">PortfolioS</li>
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

    <!-- portfolio-area -->
    <section class="portfolio__inner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio__inner__nav">
                        <button class="active" data-filter="*">all</button>
                        @foreach($categories as $category)
                            <button data-filter=".cat-{{$category->id}}">{{$category->name}}</button>
                        @endforeach                        
                    </div>
                </div>
            </div>
            <div class="portfolio__inner__active">
                @foreach($portfolios as $portfolio) 
                <div class="{{'portfolio__inner__item grid-item cat-'.($portfolio->categoryName ? $portfolio->category : '')}}">
                                      
                            <div class="row gx-0 align-items-center">
                                <div class="col-lg-6 col-md-10">
                                    <div class="portfolio__inner__thumb">
                                        <a href="{{route('client.portfolio.detail',$portfolio->id)}}">
                                            <img src="{{$portfolio->image_url ? asset($portfolio->image_url) : asset('upload/portfolio/no_image.png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-10">
                                    <div class="portfolio__inner__content">
                                        <h2 class="title"><a href="{{route('client.portfolio.detail',$portfolio->id)}}">{{$portfolio->title}}</a></h2>
                                        <div class="overflow-hidden">
                                            {!! Str::words($portfolio->description,30) !!}
                                        </div>
                                        <a href="{{route('client.portfolio.detail',$portfolio->id)}}" class="link">View Case Study</a>
                                    </div>
                                </div>
                            </div>
                    
                </div>
                @endforeach             

            </div>
            <div class="pagination-wrap">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">                        
                        @if(app('request')->input('page') > 1)
                            <li class="page-item"><a class="page-link" href="{{route('client.portfolio.list',['page'=>app('request')->input('page')-1])}}"><i class="far fa-long-arrow-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="{{route('client.portfolio.list',['page'=>app('request')->input('page')-1])}}">{{app('request')->input('page')-1}}</a></li>
                        @endif
                             <li class="page-item"><a class="page-link" href="#">{{app('request')->input('page')}}</a></li>
                        @if(app('request')->input('page') < $paginationTabCount)
                            <li class="page-item"><a class="page-link" href="{{route('client.portfolio.list',['page'=>app('request')->input('page')+1])}}">{{app('request')->input('page')+1}}</a></li>
                            <li class="page-item"><a class="page-link" href="{{route('client.portfolio.list',['page'=>app('request')->input('page')+1])}}"><i class="far fa-long-arrow-right"></i></a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- portfolio-area-end -->


    <!-- contact-area -->
    <section class="homeContact homeContact__style__two">
        <div class="container">
            <div class="homeContact__wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section__title">
                            <span class="sub-title">07 - Say hello</span>
                            <h2 class="title">Any questions? Feel free <br> to contact</h2>
                        </div>
                        <div class="homeContact__content">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                            <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="homeContact__form">
                            <form action="#">
                                <input type="text" placeholder="Enter name*">
                                <input type="email" placeholder="Enter mail*">
                                <input type="number" placeholder="Enter number*">
                                <textarea name="message" placeholder="Enter Massage*"></textarea>
                                <button type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

</main>


@endsection