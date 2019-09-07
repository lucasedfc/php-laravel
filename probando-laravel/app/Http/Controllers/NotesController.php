<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class NotesController extends Controller
{
    public function getIndex() {

        //get all notes
        $notes = DB::table('notes')->get();
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
        $note = DB::table('notes')->select('id', 'title', 'description  ')->where('id', $id)->first();

        //var_dump($note);
        

        if(empty($note)) {
            return redirect()->action('NotesController@getIndex');
        }
    
        return view('notes.note', array(
            'note' => $note
        ));
    }
}