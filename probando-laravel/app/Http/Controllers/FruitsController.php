<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FruitsController extends Controller
{
    // Action that return a view
    public function index() {
        return view('fruits.index')
        ->with('fruits', array('naranja', 'mandarina', 'banana', 'pera'));
    }

    public function oranges() {
        return 'Action from Oranges';
    }

    public function apples() {
        return 'Action from Apples';
    }
}
