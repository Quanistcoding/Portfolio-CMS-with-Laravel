




<div class="comment comment__wrap">
    <div class="comment__title">
        <h4 class="title">(04) Comment</h4>
    </div>
    <ul class="comment__list">
        <li class="comment__item">
            <div class="comment__thumb">
                <img src="{{asset('client/assets/img/blog/comment_thumb01.png')}}" alt="">
            </div>
            <div class="comment__content">
                <div class="comment__avatar__info">
                    <div class="info">
                        <h4 class="title">Rohan De Spond</h4>
                        <span class="date">25 january 2021</span>
                    </div>
                    <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
                </div>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many variations of passages of Lorem Ipsum available, but the majority have</p>
            </div>
        </li>
        <li class="comment__item children">
            <div class="comment__thumb">
                <img src="{{asset('client/assets/img/blog/comment_thumb02.png')}}" alt="">
            </div>
            <div class="comment__content">
                <div class="comment__avatar__info">
                    <div class="info">
                        <h4 class="title">Johan Ritaxon</h4>
                        <span class="date">25 january 2021</span>
                    </div>
                    <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
                </div>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many variations of passages</p>
            </div>
        </li>
        <li class="comment__item">
            <div class="comment__thumb">
                <img src="{{asset('client/assets/img/blog/comment_thumb03.png')}}" alt="">
            </div>
            <div class="comment__content">
                <div class="comment__avatar__info">
                    <div class="info">
                        <h4 class="title">Alexardy Ditartina</h4>
                        <span class="date">25 january 2021</span>
                    </div>
                    <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
                </div>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many variations of passages of Lorem Ipsum available, but the majority have</p>
            </div>
        </li>
        <li class="comment__item children">
            <div class="comment__thumb">
                <img src="{{asset('client/assets/img/blog/comment_thumb04.png')}}" alt="">
            </div>
            <div class="comment__content">
                <div class="comment__avatar__info">
                    <div class="info">
                        <h4 class="title">Rashedul islam Kabir</h4>
                        <span class="date">25 january 2021</span>
                    </div>
                    <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
                </div>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many variations of passages</p>
            </div>
        </li>
    </ul>
</div>
<div class="comment__form">
    <div class="comment__title">
        <h4 class="title">Write your comment</h4>
    </div>
    <form action="{{route('client.posts')}}" method="post">
        @csrf
        <input hidden name = "post_id" value = "{{$post_id}}">
        <div class="row">
            <div class="col-md-6">
                <input type="text" placeholder="Enter your name*" name = "author_name">
            </div>
            <div class="col-md-6">
                <input type="email" placeholder="Enter your mail*" name = "author_email">
            </div>
            <div class="col-md-6">
                <input type="text" placeholder="Enter your number*" name = "author_phone">
            </div>
            <div class="col-md-6">
                <input type="text" placeholder="Website*" name = "author_website">
            </div>
        </div>
        <textarea name="content" id="message" placeholder="Enter your Massage*"></textarea>
       
        <button type="submit" class="btn">post a comment</button>
    
    </form>
</div> 
<div style = "height: 120px"></div>