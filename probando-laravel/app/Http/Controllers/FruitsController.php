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

    public function getApples($param) {
        return 'Action from Apples'.$param;
    }
}
