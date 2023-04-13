@php
    $about = App\Models\About::find(1);
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
                    <li>
                        <img class="light" src="{{asset('client/assets/img/icons/xd_light.png')}}" alt="XD">
                        <img class="dark" src="{{asset('client/assets/img/icons/xd.png')}}" alt="XD">
                    </li>
                    <li>
                        <img class="light" src="{{asset('client/assets/img/icons/skeatch_light.png')}}" alt="Skeatch">
                        <img class="dark" src="{{asset('client/assets/img/icons/skeatch.png')}}" alt="Skeatch">
                    </li>
                    <li>
                        <img class="light" src="{{asset('client/assets/img/icons/illustrator_light.png')}}" alt="Illustrator">
                        <img class="dark" src="{{asset('client/assets/img/icons/illustrator.png')}}" alt="Illustrator">
                    </li>
                    <li>
                        <img class="light" src="{{asset('client/assets/img/icons/hotjar_light.png')}}" alt="Hotjar">
                        <img class="dark" src="{{asset('client/assets/img/icons/hotjar.png')}}" alt="Hotjar">
                    </li>
                    <li>
                        <img class="light" src="{{asset('client/assets/img/icons/invision_light.png')}}" alt="Invision">
                        <img class="dark" src="{{asset('client/assets/img/icons/invision.png')}}" alt="Invision">
                    </li>
                    <li>
                        <img class="light" src="{{asset('client/assets/img/icons/photoshop_light.png')}}" alt="Photoshop">
                        <img class="dark" src="{{asset('client/assets/img/icons/photoshop.png')}}" alt="Photoshop">
                    </li>
                    <li>
                        <img class="light" src="{{asset('client/assets/img/icons/figma_light.png')}}" alt="Figma">
                        <img class="dark" src="{{asset('client/assets/img/icons/figma.png')}}" alt="Figma">
                    </li>
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