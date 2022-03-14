<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $posts = \App\Post::all();
        $tags = \App\Tag::all();

        return view('posts.index', ['posts' => $posts, 'tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $publish = false;

        if($request->creator_id == 1){
            $publish = true;
        }

        \DB::transaction(function () use($request, $publish) {

            $post = Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'creator' => $request->creator,
                'published' => $publish,
            ]);

            $post->tags()->syncWithoutDetaching($request->tags);
        
        });

        return redirect('posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $publish = false;

        if($request->publish!=null){
            $publish = true;
        }

        \DB::transaction(function () use($post, $request, $publish) {

            $post->update([
                'title' => $request->title,
                'body' => $request->body,
                'published' => $publish,
            ]);

            $post->tags()->sync($request->tags);
        
        });

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar(Post $post)
    {
        $post->delete();

        return redirect('posts');
    }
    
    public function ver($id){
        $post = Post::find($id);
        return view('posts.post', ['post' => $post]);
    }
}
