<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Redirect;
use Storage;
use DB;
use Image;

class GalleryController extends Controller
{
     public function __construct(){
        $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = DB::table('galleries')->get();
        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'=>'required|mimes:jpg,png,jpeg|image|max:8024'
        ]);
        if($request->hasFile('image')){
            $imagenameWithExtension = $request->file('image')->getClientOriginalName();
            $imagename = pathinfo($imagenameWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageToStore = $imagename.'_'.time().'.'.$extension;
            $request->file('image')->storeAs('public/gallery',$imageToStore);
            $path = public_path('storage/gallery/'.$imageToStore);
            $resizedImage = Image::make($path)->resize(300,200)->save($path); 
            
        }
        

        $image = new Gallery;
        $image->image = $imageToStore;
        $image->user_id = auth()->user()->id;
        $image->save();
        return redirect()->route('home')->withSuccess('New picture uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Gallery::find($id);
        $image->delete();
        Storage::delete('public/gallery/',$image->image);

        return Redirect::back()->withSuccess('Picture deleted');
    }
}
