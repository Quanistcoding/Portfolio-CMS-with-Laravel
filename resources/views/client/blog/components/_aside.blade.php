@php
        $blogs = App\Models\Blog::all();
        $blogCount = count($blogs);
@endphp

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