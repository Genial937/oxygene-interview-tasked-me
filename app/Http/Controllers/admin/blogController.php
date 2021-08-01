<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with(['users'])->latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => ['required'],
            'content' => ['required']
        ]);

        //store in a disk location
        $filename = "";
        if($request->has('photo')){
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('blogs'), $filename);
        }
        $user = Auth::user()->id;
        $blog = new Blog();
        $blog->user_id = $user;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->photo = 'blogs/'.$filename;
        $blog->save();
        return back()->with('message', 'Blog posted successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.edit', compact('blog'));
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
        $data = $this->validate($request, [
            'title' => ['required'],
            'content' => ['required']
        ]);

        $blog = Blog::find($id);

        //store in a disk location
        $blogname = $blog->photo;
        if($request->has('photo')){
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $blogname = 'blogs/'.$filename;
            $file->move(public_path('blogs'), $filename);
        }
        $user = Auth::user()->id;
        $blog->user_id = $user;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->photo = $blogname;
        $blog->save();
        return back()->with('message', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id)->delete();
        return back();
    }
}
