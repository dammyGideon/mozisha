<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskComment extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id', 'connect_id', 'status', 'task_id', 'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(TaskCommentReply::class)->orderBy('created_at', 'ASC');
    }
}
