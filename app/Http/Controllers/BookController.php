<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    //create all crud controller
    public function addBook(){
        return view ('add-book');
    }
}
