<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $user = Auth::user();

        $input = $request->all();
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = $name;
        }
        $user->post()->create($input);
        $request->session()->flash('post-c', 'Post has been created');
        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $posts = Post::findOrFail($id);
        return view('admin.posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $user = Auth::user();

        $input = $request->all();
        if($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = $name;
        }
        $user->post()->whereId($id)->first()->update($input);
        $request->session()->flash('post-u', 'Post has been updated');
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $posts = Post::findOrFail($id);
        unlink(public_path() . '/images/' . $posts->image);
        $posts->delete();
        Session::flash('deleted-p', 'The post has been deleted');
        return redirect('admin/posts');
    }

    public function post($slug) {
        $post = Post::findBySlugOrFail($slug);
        $comments = $post->comment()->orderBy('created_at', 'desc')->get();
        return view('post', compact('post','comments'));
    }

    public function welcome()
    {
        //
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }
}
