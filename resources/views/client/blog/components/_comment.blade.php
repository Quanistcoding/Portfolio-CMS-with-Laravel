<div class="comment comment__wrap">
    <div class="comment__title">
        <h4 class="title">({{count($comments)}}) Comment</h4>
    </div>
    <ul class="comment__list">
        @foreach($comments as $comment)
            <li class="comment__item">
                <div class="comment__content">
                    <div class="comment__avatar__info">
                        <div class="info">
                            <h4 class="title">{{$comment->author_name}}</h4>
                            <span class="date">{{$comment->created_at}}</span>
                        </div>
                        <a onclick = "replyComment({{$comment}})" href="#commentForm" class="reply"><i class="far fa-reply-all"></i></a>
                    </div>
                    <p>{{$comment->content}}</p>
                </div>
            </li>
            @foreach($comment->childrenComments as $childrencomment)
                <li class="comment__item children">
                    <div class="comment__content">
                        <div class="comment__avatar__info">
                            <div class="info">
                                <h4 class="title">{{$childrencomment->author_name}}</h4>
                                <span class="date">{{$childrencomment->created_at}}</span>
                            </div>
                        </div>
                        <p>{{$childrencomment->content}}</p>
                    </div>
                </li>
            @endforeach
        @endforeach
    </ul>
</div>
<div id = "commentForm" style = "height:10px"></div>
<div class="comment__form">
    <div class="comment__title">
        <h4 class="title">Write your comment</h4>
    </div>
    <form action="{{route('client.posts')}}" method="post">
        @csrf
        <div id = "parantPostContainer">
            

        </div>
        <button class = "btn btn-info" onclick = "cancelReply(event)" id = "cancelRaplyButton" style = "display:none">Cancel Reply</button>

        <input hidden name = "post_id" value = "{{$post_id}}">
        <input hidden name = "parent_comment_id" id = "parentCommentIdInput">
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
<script>
function replyComment(input){
    $("#parantPostContainer").html(`<div class = 'alert alert-info'>You are replying to <strong>${input.author_name}<strong></div>`)
    $("#cancelRaplyButton").show();
    $("#parentCommentIdInput").val(input.id);
}

function cancelReply(e){
    e.preventDefault();
    $("#parantPostContainer").html("")
    $("#cancelRaplyButton").hide();
    $("#parentCommentIdInput").val(null);
}

</script>