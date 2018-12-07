<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        // get req input
        $name = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $owner_id = 1;

        // check img upload
        if($cover_image){
          $cover_image_filename = $cover_image->getClientOriginalName();
          $cover_image->move(public_path('images'), $cover_image_filename);
        } else{
          $cover_image_filename = 'Noimg.jpg';  
        }

        // insert to db
        DB::table('galleries')->insert(
            [
                'name' => $name,
                'description' => $description,
                'cover_image' => $cover_image_filename,
                'owner_id' => $owner_id
            ]
        );
        // redirect
        return \Redirect::route('gallery.index')->with('message', 'Gallery Created');
    }

    // show gallery photo
    public function show($id){
        die($id);
    }

}
