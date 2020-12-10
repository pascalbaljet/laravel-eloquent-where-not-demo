<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController
{
    public function __invoke(Request $request)
    {
        $posts = Post::query()
            ->with('user')
            ->withCount('comments')
            ->addScopeAsSelect('on_front_page', 'onFrontPage')
            ->latest('id')
            ->paginate(25);

        return view('posts', [
            'posts' => $posts,
        ]);
    }
}
