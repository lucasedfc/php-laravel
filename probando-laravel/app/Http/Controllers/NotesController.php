<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class NotesController extends Controller
{
    public function getIndex() {

        //get all notes
        $notes = DB::table('notes')->orderBy('id', 'desc')->get();
        //var_dump($notes);
        /*
        foreach ($notes as $note) {
            echo $note->title."<br>";
        }*/
        return view('notes.index', array(
            "notes" => $notes
        ));
    }

    public function getNote($id){
        //Get specific note
        $note = DB::table('notes')->select('id', 'title', 'description')->where('id', $id)->first();

        //var_dump($note);
        if(empty($note)) {
            return redirect()->action('NotesController@getIndex');
        }
    
        return view('notes.note', array(
            'note' => $note
        ));
    }

    public function postNote(Request $request) {
        
        $note = DB::table('notes')->insert(array(
            'title'=> $request->input('title'),
            'description'=> $request->input('description')
        ));
        return redirect()->action('NotesController@getIndex');
    }

    public function getSaveNote() {
        return view( 'notes.saveNote');
    }
}
