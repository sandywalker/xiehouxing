<?php

namespace App\Http\Controllers;

use App\Guide;
use App\GuideLike;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Note;
use App\NoteLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeGuide($id){
        $userId = Auth::user()->id;
        if (!GuideLike::exists($userId,$id)){
            $guide = Guide::findOrFail($id);
            $guideLike = new GuideLike;
            $guideLike->guide_id = $id;
            $guideLike->user_id = $userId;
            $guideLike->save();
            $guide->updateLikes();
            return $guide->likes;
        }
        return -1;
    }

    public function unLikeGuide($id){
        $guideLike = GuideLike::where('user_id',Auth::user()->id)->where('guide_id',$id)->first();
        if ($guideLike!=null){
            $guide = Guide::findOrFail($id);
            $guideLike->delete();
            $guide->updateLikes();
        }
        return redirect(URL::previous());
    }


    public function likeNote($id){
        $userId = Auth::user()->id;
        if (!NoteLike::exists($userId,$id)){
            $note = Note::findOrFail($id);
            $noteLike = new NoteLike;
            $noteLike->note_id = $id;
            $noteLike->user_id = $userId;
            $noteLike->save();
            $note->updateLikes();
            return $note->likes;
        }
        return -1;
    }
}
