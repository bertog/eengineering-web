<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::find(1);

        return view('blog', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->body = $request->body;

        if ($request->published) {
            $post->published = $request->published;
        } else {
            $post->published = Carbon::now();
        }

        $post->header_image = $this->UploadAndNameImage($request);

        $user = Auth::user();
        $user->posts()->save($post);

        flash()->success('Complimenti!','Post Salvato Correttamente');

        return view('post.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Post $post)
    {
        //post = Post::titled($title)->first();
        return view('post.show', compact('post'));
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
        //
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
    }

    /**
     * @param Request $request
     * @return string
     */
    private function UploadAndNameImage(Request $request)
    {
        $file = $request->file('image');

        $fileName = time() . '-' . $file->getClientOriginalName();

        $file->move('images/blog', $fileName);

        return $fileName;
    }
}
