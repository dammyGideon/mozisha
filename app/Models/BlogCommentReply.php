<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCommentReply extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id', 'name', 'email', 'website', 'message', 'status'];

    public function getImagePathAttribute()
    {
        return "https://ui-avatars.com/api/?name=$this->name&color=FFFFFF&background=563C5C";
    }
}
