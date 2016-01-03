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
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Cast\Array_;

class ArticlesController extends Controller
{

    /**
     * Middleware
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show','filtrate','showFiltered','filter']]);
        $this->middleware('articleOwner:', ['except' => ['index', 'show', 'create', 'store', 'edit', 'delete', 'update','filtrate','filter','showFiltered']]);
        $this->middleware('numberOfArticles:', ['except' => ['index', 'show', 'edit', 'delete', 'update','filtrate','filter','showFiltered']]);
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

    public function filtrate()
    {
        $tags = Tag::all();
        return view('articles.filter', [
            'tags' => $tags
        ]);
    }


    public function filter(Request $request)
    {

        $data = $request->all();

        $allArticles = Article::all();
        $title = $data['title'];
        $content = $data['content'];
        $description = $data['description'];
        //dd($content);

        $articles1=array();
        $articles2=array();
        $articles3=array();

        foreach ($allArticles as $article){
            if ($article->title == $title) {
                $articles1[]=$article;
            }
            if ($article->description == $description) {
                $articles2[]=$article;
            }
            if (strpos($article->content,$content) !== false){
                $articles3[]=$article;
            }
        }

        if(empty($title)) {
            foreach ($allArticles as $a){
                $articles1[]=$a;
            }
        }
        if(empty($description)) {
            foreach ($allArticles as $a){
                $articles2[]=$a;
            }
        }
        if(empty($content)) {
            foreach ($allArticles as $a){
                $articles3[]=$a;
            }
        }

        $articles=array_intersect($articles1,$articles2,$articles3);

        return view('articles.index',['articles' => $articles]);
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
