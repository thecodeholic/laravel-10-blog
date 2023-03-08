<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::query()
            ->where('active', '=', 1)
            ->whereDate('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('home', compact('posts'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (!$post->active || $post->published_at > Carbon::now()) {
            throw new NotFoundHttpException();
        }

        $next = Post::query()
            ->where('active', true)
            ->whereDate('published_at', '<=', Carbon::now())
            ->whereDate('published_at', '<', $post->published_at)
            ->orderBy('published_at', 'desc')
            ->limit(1)
            ->first();

        $prev = Post::query()
            ->where('active', true)
            ->whereDate('published_at', '<=', Carbon::now())
            ->whereDate('published_at', '>', $post->published_at)
            ->orderBy('published_at', 'asc')
            ->limit(1)
            ->first();

        return view('post.view', compact('post', 'prev', 'next'));
    }

    public function byCategory(Category $category)
    {
        $posts = Post::query()
            ->join('category_post', 'posts.id', '=', 'category_post.post_id')
            ->where('category_post.category_id', '=', $category->id)
            ->where('active', '=', true)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('post.index', compact('posts', 'category'));
    }
}
