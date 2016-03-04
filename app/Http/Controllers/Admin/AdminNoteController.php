<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class AdminNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Note::where('states','<>',0);
        
        return view('admin.notes.index',$this->getNotesQuery($request,$query));
    }

    public function delete($id)
    {
        $note = Note::findOrFail($id);
        Note::destroy($id); 
        return redirect(URL::previous());
    }

    public function checkNotes(Request $request)
    {
        $query = Note::where('states','=',0);
        
        return view('admin.notes.cnotes',$this->getNotesQuery($request,$query));
    }

    public function checkNote($id,$result,Request $request)
    {
        $note = Note::findOrFail($id);
        $note->states = $result == 'approve'?1:-1;
        $note->save();
        return redirect(URL::previous());
    }

    public function noteComments($id)
    {
        $note = Note::findOrFail($id);
        $note->load('comments.user');
        return $note->comments;
    }

    public function changeStates($id,$result,Request $request)
    {
        $note = Note::findOrFail($id);
        $note->states = $result == 'enable'?1:-1;
        $note->save();
        return redirect(URL::previous());
    }

    public function setTop($id,$result,Request $request)
    {
        $note = Note::findOrFail($id);
        $note->istop = $result;
        $note->save();   
        return redirect(URL::previous());
    }

    private function getNotesQuery(Request $request,$query)
    {
        $key = '';
        if ($request->has('key')){
            $key = $request->input('key');
            $query->where('title','like','%'.$key.'%')->orWhere('place','like','%'.$key.'%');
        }
        $notes = $query->orderBy('istop','desc')->orderBy('id','desc')->paginate(20);  
        return compact('key','notes');
    }

   
}
