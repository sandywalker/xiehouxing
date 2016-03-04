<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title','tag','description','content'];

    public static function byTag($value)
    {
    	$article = Article::where('tag',$value)->first();
    	if ($article==null){
    		$article = new Article;
    		$article->title = '';
    		$article->content = '暂无内容';
    	}
    	return $article;
    }
}
