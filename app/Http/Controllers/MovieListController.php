<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class MovieListController extends Controller
{
    public function index() {
    	$lists = 0;
    	$type = "class='fa fa-home' aria-hidden='true'";

    	return view('index')->with([
            'lists' => $lists,
            'type' => $type,
        ]);
    }

    public function add(Request $request) {
        return view('add');
	}
}
