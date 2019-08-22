<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)
            ->with('user')->latest()->paginate(5);
        return view('posts.index')->with(compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostsRequest $request)
    {
        $imagePath = $request['image']->store('uploads/'.Auth::user()->id, 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        $post = Auth::user()->posts()->create([
            'caption' => $request['caption'],
            'image' => $imagePath,
        ]);
        return redirect()->route('profile.show', ['user' => Auth::user()->id]);
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(compact('post'));
    }
}
