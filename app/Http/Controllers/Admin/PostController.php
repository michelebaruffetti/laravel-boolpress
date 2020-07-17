<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Category;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:posts,title',
            'content' => 'required'
        ]);

        $dati = $request->all();
        $slug = Str::of($dati['title'])->slug('-');
        $slug_iniziale = $slug;
        $post_trovato = Post::where('slug', $slug)->first();
        $contatore = 1;
        while ($post_trovato) {
            $slug = $slug_iniziale.'-'.$contatore;
            $post_trovato = Post::where('slug', $slug)->first();
            $contatore ++;
        }

        $dati['slug'] = $slug;
        $nuovo_post = new Post();
        $nuovo_post->fill($dati);
        $nuovo_post->save();

        return redirect()-> route('admin.posts.index');
    }


    public function show($id)
    {
        $post = Post::find($id);
        if($post) {
            return view('admin.posts.show', compact('post'));
        } else {
            return abort('404');
        }
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if($post) {
            $categories = Category::all();
            return view('admin.posts.edit', compact('post', 'categories'));
        } else {
            return abort('404');
        }
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $dati = $request->all();
        $slug = Str::of($dati['title'])->slug('-');
        $slug_iniziale = $slug;
        $post_trovato = Post::where('slug', $slug)->first();
        $contatore = 1;
        while ($post_trovato) {
            $slug = $slug_iniziale.'-'.$contatore;
            $post_trovato = Post::where('slug', $slug)->first();
            $contatore ++;
        }

        $dati['slug'] = $slug;

        $post->update($dati);


        return redirect()-> route('admin.posts.index');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        if($post) {
            $post->delete();
            return redirect()->route('admin.posts.index');
        } else {
            return abort('404');
        }
    }
}
