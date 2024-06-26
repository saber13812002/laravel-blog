<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class PostFeedController extends Controller
{
    /**
     * Show the rss feed of posts.
     */
    public function index(): Response
    {
        $posts = Cache::remember('feed-posts', now()->addHour(), fn() => Post::latest()->limit(20)->get());

        return response()->view('posts_feed.index', [
            'posts' => $posts
        ], 200)->header('Content-Type', 'text/xml');
    }
    /**
     * Show the rss feed of posts.
     */
    public function comments(): Response
    {
        $comments = Cache::remember('feed-comments', now()->addHour(), fn() => Comment::latest()->limit(20)->get());

        return response()->view('comments_feed.index', [
            'comments' => $comments
        ], 200)->header('Content-Type', 'text/xml');
    }

    /**
     * Show the rss feed of posts.
     */
    public function userId($userId): Response
    {
        $posts = Cache::remember('feed-posts-users-' . $userId, now()->addMinutes(),
            fn() => Post::latest()
                ->whereAuthorId($userId)
                ->limit(20)
                ->get());

        return response()->view('posts_feed.index', [
            'posts' => $posts
        ], 200)->header('Content-Type', 'text/xml');
    }

    /**
     * Show the rss feed of posts.
     */
    public function commentsUserId($userId): Response
    {
        $comments = Cache::remember('feed-comments-users-' . $userId, now()->addMinutes(10),
            fn() => Comment::latest()
                ->whereAuthorId($userId)
                ->limit(20)
                ->get());

        return response()->view('comments_feed.index', [
            'comments' => $comments
        ], 200)->header('Content-Type', 'text/xml');
    }

    /**
     * Show the rss feed of posts.
     */
    public function username($username): Response
    {
        $posts = Cache::remember('feed-posts-users' . $username, now()->addMinutes(),
            fn() => Post::latest()
                ->whereAuthorId($username)
                ->limit(20)
                ->get());

        return response()->view('posts_feed.index', [
            'posts' => $posts
        ], 200)->header('Content-Type', 'text/xml');
    }
}
