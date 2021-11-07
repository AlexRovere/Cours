<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlaceholderAPIController extends Controller
{
    public function index()
    {
        // $response = Http::withOptions(['verify' => false])->get('https://jsonplaceholder.typicode.com/posts');

        $response = Http::withOptions(['verify' => false])->post('https://jsonplaceholder.typicode.com/posts', [
            'title' => 'Mon titre',
            'body' => 'Mon contenu',
            'userId' => 12
        ]);

        dd($response->json());

        // collect transforme l'array en collection qui lui ajoute des fonctionnalités interne à laravel
        return view('PlaceholderAPI.index', [
            'data' => $response->collect()
        ]);
    }
}
