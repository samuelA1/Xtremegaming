<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Post;
use App\Reply;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        $input = $request->all();
        if(trim($input['password']) == '') {
            $input = $request->except('password');
        }else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($image = $request->file('image')) {
        $name = $image->getClientOriginalName();

       $image->move('images', $name);
       $input['image'] = $name;
      }
        User::create($input);
        $request->session()->flash('created', 'The user has been created');
        return redirect('/admin/users');
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

        $users = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        $users = User::findOrFail($id);
        $input = $request->all();
        if(trim($input['password']) == '') {
            $input = $request->except('password');
        }else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($image = $request->file('image')) {

        $name = $image->getClientOriginalName();

        $image->move('images', $name);
        $input['image'] = $name;
        }
        $users->update($input);
        $request->session()->flash('updated', 'The user has been updated');
        return redirect('/admin/users');
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
        $users = User::findOrFail($id);
        unlink(public_path().'/images/'. $users->image);
        $users->delete();
        Session::flash('deleted', 'The user has been deleted');
        return redirect('admin/users');
    }

    public function admin() {
        $users = User::all();
        $posts = Post::all();
        $comments = Comment::all();
        $replies = Reply::all();
        return view('admin.index', compact('users', 'posts', 'comments', 'replies'));
    }

    public function profile() {

        return view('admin.users.profile.index');

    }
}
