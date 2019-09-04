<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FruitsController extends Controller
{
    // Action that return a view
    public function getIndex() {
        return view('fruits.index')
        ->with('fruits', array('naranja', 'mandarina', 'banana', 'pera'));
    }

    public function getOranges() {
        return 'Action from Oranges';
    }

    public function getApples() {
        return 'Action from Apples';
    }

    public function receiveFormData(Request $request){
        $data = $request;

        //var_dump($request);
        //return 'The name fruit is '.$data['name'];
        return 'The name fruit is '.$request->input('description');
        die();
    }
}
