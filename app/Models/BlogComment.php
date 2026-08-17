<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'name',
        'email',
        'content',
        'status',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo(BlogPost::class);
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}