<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;

use App\Post;

class AdminPostsController extends Controller
{
    public function index()
    {
        $post=Post::orderBy('created_at', 'DESC')->get();
        $data=['posts'=>$post];
        return view('admin.posts.index', $data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
        $post=Post::find($id);
        $data = ['post' => $post];
        return view('admin.posts.edit', $data);
    }
    public function update(PostRequest $request, $id)
    {
        $post=Post::find($id);
        $post->update($request->all());
        return redirect()->route('admin.posts.index');
    }
    public function store(PostRequest $request)
    {
        Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.posts.index');
    }


}
