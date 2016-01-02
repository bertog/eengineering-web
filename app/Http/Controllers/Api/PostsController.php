<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        return Post::PublishedPost()->get();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return ['message' => 'Articolo eliminato con successo!'];
    }

    public function archive()
    {
        return Post::onlyTrashed()->get();
    }

    public function restore($id) 
    {
        $post = Post::withTrashed()
                ->where('id', '=', $id)
                ->restore();

        return ['message' => 'Articolo nuovamente visibile'];
    }
}
