<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //List Gallerires
    public function index(){
        die('Gallery/index');
    }

    // show create form
    public function create(){
        die('gallery/Create');
    }

    // store gallery
    public function store(Request $request){

    }

    // show gallery photo
    public function show($id){
        die($id);
    }

}
