<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'is_feature',
    ];

    public function store(Request $request)
    {
        Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }

}
