<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ArticlesController extends Controller
{

    /**
     * Middleware
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('articleOwner:', ['except' => ['index', 'show', 'create', 'store', 'edit', 'delete', 'update']]);
        $this->middleware('numberOfArticles:', ['except' => ['index', 'show', 'edit', 'delete', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('created_at')->get();
        return view('articles.index', [
            'articles' => $articles
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('articles.create', [
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $article = new Article();
        $article->title = $data['title'];
        $article->video = $data['video'];
        $article->content = $data['content'];
        $article->description = $data['description'];
        $article->user()->associate(Auth::user());
        $tags = $data['tags'];


        if ($article->save()) {
            $article->tags()->attach($tags);

            $articleId = $article->id;
            $contactEmail = $article->user->email;
            $data = array('id' => $articleId, 'email' => $contactEmail);

            Mail::send('emails.article-creation', $data, function ($message) use ($data) {
                $message->subject('Article:')
                    ->to($data['email']);
            });
            return redirect('/')->with('message', 'Your article was successfully created.');
        } else {
            return redirect()->back()->with('message', 'Your article was not created. Please, try it again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', [
            'article' => $article,
            'comments' => $article->comments()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $tags = Tag::all();
        $checkedTags = $article->tags;

        return view('articles.edit', [
            'article' => $article,
            'tags' => $tags,
            'checkedTags' => $checkedTags
        ]);
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('article');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $article = Article::find($id);
        $article->title = $data['title'];
        $article->video = $data['video'];
        $article->content = $data['content'];
        $article->description = $data['description'];
        $article->user()->associate(Auth::user());
        $tags = $data['tags'];
        $oldTags = $article->tags;

        foreach ($oldTags as $oldTag){
            $oldId[]=$oldTag->id;
        }

        if($article->save()){
            if(!empty($oldId)){
                $article->tags()->detach($oldId);
            }
            $article->tags()->attach($tags);
            return redirect('/')->with('message', 'Your article was successfully created.');
        }else{
            return redirect()->back()->with('message', 'Your article was not created. Please, try it again.');
        }
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
