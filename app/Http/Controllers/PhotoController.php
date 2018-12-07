<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    // show create form
    public function create(){
        die('photo/Create');
    }

    // store photo
    public function store(Request $request){

    }

    // show photo detals
    public function details($id){
        die($id);
    }
}
