<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\NoteRequest;
use App\Note;
use App\NoteComment;
use App\NoteLike;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topNotes = Note::topNotes()->with('user')->get()->slice(0,4);
        return view('notes.index',compact('topNotes'));
    }

    public function notes()
    {
        $notes = Note::where('states',1)->orderBy('id','desc')->with('user')->paginate(24);
        return view('notes.notes',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('notes.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        $note =  Note::create($request->all());
        $uid = Auth::user()->id;
        $note->creator = $uid;
        $note->updateDescription();
        $thumb = $request->file('thumb');
        $note->saveThumb($thumb);
        return redirect('/u/'.$uid.'/notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::findOrFail($id);
        $user = User::findOrFail($note->creator);
        $liked =  Auth::check()&&NoteLike::exists(Auth::user()->id,$note->id);
        $note->incHits();

        return view('notes.show',compact('note','user','liked'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $user = Auth::user();
        
        if ($this->canUpdate($note)){
            return view('notes.edit',compact('note','user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, $id)
    {
        $note = Note::findOrFail($id);
         if ($this->canUpdate($note)){
            $note->update($request->all());
            $note->updateDescription();
            $thumb = $request->file('thumb');
            if ($thumb!=null){
                $note->saveThumb($thumb);
            }
            $note->save();
            return redirect($request->input('redirect_to'));
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

    public function delete($id)
    {
        $note = Note::findOrFail($id);
        
        if ($this->canUpdate($note)){
            Note::destroy($id);  
        }
        return redirect(URL::previous());
    }

    public function storeComments(CommentRequest $request,$id)
    {
        $note = Note::findOrFail($id);   
        $comment = new NoteComment;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->input('content');
        $comment->note_id = $id;
        $comment->save();
        Note::updateCommentCount($note);
        return redirect('notes/'.$id.'#comments');
    }

    private function canUpdate($note)
    {
        $user = Auth::user();
        return $user->id == $note->creator;
    }
}
