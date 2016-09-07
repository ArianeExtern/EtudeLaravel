<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reponse;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class PostController extends Controller
{
    //

    public function store(){
        $p = request()->all();
        Post::create(['titre' => $p['titre'], 'body' => $p['textarea']]);
        return redirect('/home');
    }

    public function getPost(){
        return view('pages.show', ['post' => Post::with('comments')->find(request()->get('id')),]);
    }

    public function deletePost(Post $post){
        $post->delete();
        return back();
    }

    public function editPost(){
        return view('pages.edit', ['post' => Post::find(request()->get('id'))]);
    }

    public function updatePost(Post $post){
        $post->update(['titre' => request()->get('titre'), 'body' => request()->get('textarea')]);
        return back();
    }

    public function addComment(Post $post){
        $post->comments()->save(new Comment(['content' => request()->get('comment')]));
        return back();
    }

    public function addReponse(Comment $comment){
        $comment->reponses()->save(new Reponse(['content' => request()->get('rep')]));
        return back();
    }
}
