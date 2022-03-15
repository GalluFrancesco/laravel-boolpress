<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|min:5",
            "content" => "required|min:20",
          ]);
      
          $post = new Post();
          $post->fill($data);
      
          // Genero lo slug partendo dal titolo
          $slug = Str::slug($post->title);
      
          // controllo a db se esiste già un elemento con lo stesso slug
          $exists = Post::where("slug", $slug)->first();
          $counter = 1;
      
          // Fintanto che $exists ha un valore diverso da null o false,
          // eseguo il while
          while ($exists) {
            // Genero un nuovo slug, prendendo quello precedente e concatenando un numero incrementale
            $newSlug = $slug . "-" . $counter;
            $counter++;
      
            // controllo a db se esiste già un elemento con i nuovo slug appena generato
            $exists = Post::where("slug", $newSlug)->first();
      
            // Se non esiste, salvo il nuovo slug nella variabile $slub che verrà poi usata
            // per assegnare il valore all'interno del nuovo post.
            if (!$exists) {
              $slug = $newSlug;
            }
          }
      
          // Assegno il valore di slug al nuovo post
          $post->slug = $slug;
          $post->user_id = Auth::user()->id;
      
          $post->save();
      
          return redirect()->route("admin.posts.index");
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
}
