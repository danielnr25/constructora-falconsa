<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::oldest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['slug' => Str::slug($request->slug)]);
        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'excerpt' => 'required',
            'description' => 'required',
            'imagen' => 'required',
        ]);

        Post::create([
            'title' => request('title'),
            'slug' => request('slug'),
            'excerpt' => request('excerpt'),
            'description' => request('description'),
            'imagen' => request('imagen'),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->request->add(['slug' => Str::slug($request->slug)]);
        $this->validate(request(), [
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts')->ignore($post->id)],
            'excerpt' => 'required',
            'description' => 'required',
            'imagen' => 'required',
        ]);

        $post->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'excerpt' => request('excerpt'),
            'description' => request('description'),
            'imagen' => request('imagen'),
        ]);


        return redirect()->route('admin.posts.index')->with('success', 'Post actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->status == 'ACTIVE') {
            $post->update(['status' => 'INACTIVE']);
            return redirect()->route('admin.posts.index')->with('success', 'Post desactivado correctamente');
        } else {
            $post->update(['status' => 'ACTIVE']);
            return redirect()->route('admin.posts.index')->with('success', 'Post activado correctamente');
        }
    }


    public function posts()
    {
        $posts = Post::where('status', 'ACTIVE')->latest('id')->paginate(5);
        return view('blog', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('includes.blog.show', compact('post'));
    }

}
