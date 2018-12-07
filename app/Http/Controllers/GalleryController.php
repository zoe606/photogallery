<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //List Gallerires
    public function index(){
        // render view
       return view('gallery/index');
    }

    // show create form
    public function create(){
        // render view
       return view('gallery/create');
    }

    // store gallery
    public function store(Request $request){

    }

    // show gallery photo
    public function show($id){
        die($id);
    }

}
