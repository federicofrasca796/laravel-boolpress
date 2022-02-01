<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ddd(Auth::user()->posts()->get());
        $posts = Auth::user()->posts()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', ['categories' => Category::all(), 'tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request->all());
        $validated = $request->validate([
            'title' => 'required|max:200',
            'cover' => 'nullable',
            'sub_title' => 'nullable',
            'body' => 'nullable',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if ($request->has('tags')) {
            $request->validate([
                'tags' => 'nullable|exists:tags,id',
            ]);
        };
        $validated['slug'] = Str::slug($validated['title']);
        // ddd(Auth::user()->id);
        $validated['user_id'] = Auth::id();

        // ddd($request->file('cover_file'));
        if ($request->file('cover_file')) {
            $validated['cover'] = Storage::put('post_covers', $request->cover_file);
        }
        $new_post = Post::create($validated);
        $new_post->tags()->attach($request->tags);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:200',
            'cover' => 'nullable',
            'sub_title' => 'nullable',
            'body' => 'nullable',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $validated['slug'] = Str::slug($validated['title']);


        // ddd($request->all(), $validated);
        if ($request->has('tags')) {
            $request->validate([
                'tags' => 'nullable|exists:tags,id',
            ]);
            $post->tags()->sync($request->tags);
        };


        // ddd($request->all());
        if ($request->file('cover_file')) {
            Storage::delete($post->cover);
            $validated['cover'] = Storage::put('post_covers', $request->cover_file);
        }
        $post->update($validated);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->cover);
        $post->delete();

        return redirect()->back()->with('message', "You deleted record n. $post->id");
    }
}