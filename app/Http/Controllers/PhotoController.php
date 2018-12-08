<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PhotoController extends Controller
{
    private $table = 'photos';

    // show create form
    public function create($gallery_id){
        // render view
        return view('photo/create', compact('gallery_id'));
    }

    // store photo
    public function store(Request $request){
        // get req input
        $gallery_id = $request->input('gallery_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1;

        // check img upload
        if($image){
          $image_filename = $image->getClientOriginalName();
          $image->move(public_path('images'), $image_filename);
        } else{
          $image_filename = 'Noimg.jpg';  
        }

        // insert to db
        DB::table($this->table)->insert(
            [
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'gallery_id' => $gallery_id,
                'image' => $image_filename,
                'owner_id' => $owner_id
            ]
        );

        // set msg
        \Session::flash('message', 'Photo Added');
        // redirect
        return \Redirect::route('gallery.show', array('id' => $gallery_id));

    }

    // show photo details
    public function details($id){
        // get photo
        $photo = DB::table($this->table)->where('id', $id)->first();

        // render template
        return view('photo/details', compact('photo'));
    }
}
