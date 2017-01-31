<?php

namespace App\Backend\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'id',
        'name',
        'description',
        'content',
        'status',
        'url',
        'title',
        'post_order',
        'pages_id',
        'created_by','updated_by','deleted_by','created_at','updated_at','deleted_at'
    ];
}
