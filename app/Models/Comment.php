<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function post(){
        return $this->BelongsTo(Blog::class,'post_id','id');
    }

    public function childrenComments(){


        return $this->hasMany(Comment::class,'parent_comment_id','id')->where('approved','=',1);
    }
}
