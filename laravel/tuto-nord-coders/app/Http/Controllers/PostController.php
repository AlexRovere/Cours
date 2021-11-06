<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            'Mon super premier titre',
            'Mon super second titre',
        ];
        $title = 'Mon super premier titre';
        $title2 = 'Mon super second titre';
        return view('articles', compact('posts'));
    }

    public function show($id)
    {
        $posts = [
            1 => 'Mon titre n°1',
            2 => 'Mon titre n°2'
        ];

        $post = $posts[$id] ?? 'pas de titre';

        return view('article', [
            'post' => $post,
        ]);
    }

    public function contact()
    {
        return view('contact');
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