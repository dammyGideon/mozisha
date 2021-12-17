<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCommentReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'connect_id', 'status', 'task_comment_id', 'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
