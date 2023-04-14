@php
    $about = App\Models\About::find(1);
    $imageGroup = App\Models\imageGroup::all();
@endphp



<section class="banner">
    <div class="container custom-container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <div class="banner__img text-center text-xxl-end">
                    <img src="{{asset($about->image_url)}}" alt="">
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="banner__content">
                    <h2 class="title wow fadeInUp" data-wow-delay=".2s"><span>I will give you Best</span> <br> Product in the shortest time.</h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">I'm a Rasalina based product design & visual designer focused on crafting clean & user‑friendly experiences</p>
                    <a href="{{route('client.about')}}" class="btn banner__btn wow fadeInUp" data-wow-delay=".6s">more about me</a>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll__down">
        <a href="#aboutSection" class="scroll__link">Scroll down</a>
    </div>
    <div class="banner__video">
        <a href="{{$about->video_url}}" class="popup-video"><i class="fas fa-play"></i></a>
   
</section>
<!-- banner-area-end -->

<!-- about-area -->
<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach($imageGroup as $iamge)
                    <li>
                        <img class="light" src="{{asset($iamge->image_url)}}" alt="XD">
                    </li>

                    @endforeach
 
                    
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{$about->title}}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{asset('client/assets/img/icons/about_icon.png')}}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p></p>
                        </div>
                    </div>
                    <p class="desc">{{$about->sub_title}}</p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>