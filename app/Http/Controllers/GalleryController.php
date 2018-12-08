<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class GalleryController extends Controller
{   
    private $table = 'galleries';

    //List Gallerires
    public function index(){
        // get all galleries
        $galleries = DB::table($this->table)->get();

        // render view
       return view('gallery/index', compact('galleries'));
    }

    // show create form
    public function create(){
        // check if loggedin
        if(!Auth::check()){
            return \Redirect::route('gallery.index');   
        }
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
        DB::table($this->table)->insert(
            [
                'name' => $name,
                'description' => $description,
                'cover_image' => $cover_image_filename,
                'owner_id' => $owner_id
            ]
        );

        // set msg
        \Session::flash('message', 'Gallery Added');
        // redirect
        return \Redirect::route('gallery.index');
    }

    // show gallery photo
    public function show($id){
        //  get gallery
        $gallery = DB::table($this->table)->where('id', $id)->first();

        // get photo
        $photos = DB::table('photos')->where('gallery_id', $id)->get();
        
        // render view
        return view('gallery/show', compact('gallery', 'photos'));
    }

}
