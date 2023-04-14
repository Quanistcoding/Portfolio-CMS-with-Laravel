      @php
        $portfolios = App\Models\Portfolio::all();
        $categories = App\Models\PortfolioCategory::all();
      @endphp
      
      <section class="portfolio">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section__title text-center">
                        <span class="sub-title">04 - Portfolio</span>
                        <h2 class="title">All creative work</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12">
                    <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                                    role="tab" aria-controls="all" aria-selected="true">All</button>
                            </li>
                        @foreach($categories as $category)
                            @if($category->portfolio_count > 0)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="id{{$category->id}}" data-bs-toggle="tab" data-bs-target="#targetId_{{$category->id}}" type="button"
                                        role="tab" aria-controls="website" aria-selected="false">{{$category->name}}</button>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content" id="portfolioTabContent">
            <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="container">
                    <div class="row gx-0 justify-content-center">
                        <div class="col">
                            <div class="portfolio__active">
                                @foreach($portfolios as $portfolio)
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset($portfolio->image_url)}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>{{$portfolio->category}}</span>
                                            <h4 class="title"><a href="portfolio-details.html">{{$portfolio->title}}</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                @endforeach
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($categories as $category)
                <div class="tab-pane" id="targetId_{{$category->id}}" role="tabpanel" aria-labelledby="{{$category->id}}-tab">
                    <div class="container">
                        <div class="row gx-0 justify-content-center">
                            <div class="col">
                                <div class="portfolio__active">
                                    @foreach($portfolios as $portfolio)
                                        @if($category->id == $portfolio->category)
                                        <div class="portfolio__item">
                                            <div class="portfolio__thumb">
                                                <img src="{{asset($portfolio->image_url)}}" alt="">
                                            </div>
                                            <div class="portfolio__overlay__content">
                                                <span>{{$portfolio->category}}</span>
                                                <h4 class="title"><a href="portfolio-details.html">{{$portfolio->title}}</a></h4>
                                                <a href="portfolio-details.html" class="link">Case Study</a>
                                            </div>
                                        </div>
                                        @endif                                       
                                   @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach            
        </div>
    </section>
    <!-- portfolio-area-end -->