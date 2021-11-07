<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class PostController extends Controller
{
    public function index()
    {
        // Récupère tous les articles en bdd
        $posts = Post::all()->sortBy('title')->take(10);
        $video = Video::find(1);
        $title = 'Mon super premier titre';
        $title2 = 'Mon super second titre';
        return view('articles', compact('posts', 'video'));
    }

    public function show($id)
    {
        // $post = Post::find($id) ?? 'pas de titre';
        // OR 
        $post = Post::findOrFail($id);

        //Récupéré un post avec une autre clé que l'id
        // $post = Post::where('title', '=', 'Dignissimos placeat id molestiae.')->firstOrFail();


        return view('article', [
            'post' => $post,
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function create()
    {
        return view('form');
    }

    public  function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:5|max:255|unique:posts',
            'content' => ['required', 'max:255', new Uppercase()]
        ]);


        //Enregistrement de l'image dans le dossier storage/app/avatars
        if ($request->avatar != null) {
            $request->avatar->store('avatars');
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('welcome')->with('status', 'Article crée !');

        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        // dd('Post crée !');
    }

    public function update($id)
    {
        $post = Post::findOrFail($id);
        return view('update', [
            'post' => $post
        ]);
    }

    public function storeUpdate(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);
        $post->save();
        return redirect()->route('welcome')->with('status', 'Article numéro ' . $request->id . ' a bien été modifié !');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('welcome')->with('status', 'Article numéro ' . $id . ' a bien été supprimé !');;
    }

    public function register()
    {
        $post = Post::find(3);
        $video = Video::find(1);
        $comment1 = new Comment([
            'content' => 'Mon premier commentaire'
        ]);
        $comment2 = new Comment([
            'content' => 'Mon deuxième commentaire'
        ]);
        $comment3 = new Comment([
            'content' => 'Mon troisième commentaire'
        ]);

        $video->comments()->save($comment3);
        $post->comments()->saveMany([$comment1, $comment2]);
    }
}

// Array d'objet

// return view('articles', [
//     'title' => $title,
//     'title2' => $title2,
// ]);

// Compact (plusieurs var ou un array)

// return view('articles', compact('title', 'title2')  OU compact('posts')
// );

// With (1 seul variable)

// return view('articles')->with('title', $title);