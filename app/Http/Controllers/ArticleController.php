<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //

    public function show($tag,Request $request)
    {
    	$article = Article::byTag($tag);
    	return view('article.show',compact('article','tag'));
    }
}
