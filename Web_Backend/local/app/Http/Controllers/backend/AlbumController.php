<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\Album;
use App\Model\Image;

class AlbumController extends Controller
{

    public function getAlbum() {
        return view('backend.album');
    }

    public function postAlbum(Request $request) {

        $this->validate($request,[
    		'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,bmp,svg,gif',
    	]);

        $PathDir = new Image;
        $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
        $destinationPath = $PathDir->PathSaveImage();
        $request->file('image')->move($destinationPath, $imageName);

        $album = new Album;
        $album->name = $request->name;
        $album->image = $imageName;
        $album->save();

        return 'Success';

    }

    public function getViewAlbum() {
        $data = Album::paginate(100);
		      return response()->json(['model' => $data]);
    }

    public function postRemoveAlbum(Request $request) {
        $PathDir = new Image;
        $model = Album::where('id', '=', $request->id)->first();
        $destinationPath = $PathDir->PathSaveImage();
        Storage::delete($destinationPath . $model->image);

        $image = Image::where('type', '=', $model->id)->get();

        foreach ($image as $key) {
            Storage::delete($destinationPath . $key->name);
            Image::destroy($key->id);
        }

       return Album::destroy($request->id);

    }

    public function postImageAlbum(Request $request) {
        if ($request->hasFile('image')) {

            foreach($request->image as $key) {
                for ($i=0; $i < $key; $i++) {
                    $PathDir = new Image;
                    $imageName = time().$i.'.'.$request->file('image.'.$i)->getClientOriginalExtension();
                    $destinationPath = $PathDir->PathSaveImage();
                    $request->file('image.'.$i)->move($destinationPath, $imageName);

                }
                return 'success';
            }

        } else {
            return 'error';
        }
    }



    public function getAlbumView($id) {
        $model = Album::find($id);
        return view('backend.albumview')->with('model', $model);
    }

    public function postAlbumImage(Request $request) {
        if ($request->hasFile('image')) {

            foreach($request->image as $key) {
                for ($i=0; $i < $key; $i++) {
                    $PathDir = new Image;
                    $imageName = time().$i.'.'.$request->file('image.'.$i)->getClientOriginalExtension();
                    $destinationPath = $PathDir->PathSaveImage();
                    $request->file('image.'.$i)->move($destinationPath, $imageName);

                    $im = new Image;
                    $im->name = $imageName;
                    $im->path = $destinationPath;
                    $im->type = $request->id;
                    $im->save();
                }
                return 'success';
            }

        } else {
            return 'error';
        }
    }

    public function getAlbumImage($id) {

        $data = Image::where('type', '=', $id)->paginate(100);
		return response()->json(['model' => $data]);

    }

    public function postRemoveImage(Request $request) {

        $model = Image::find($request->id);
        $PathDir = new Image;
        $destinationPath = $PathDir->PathSaveImage();
        Storage::delete($destinationPath . $model->name);
        Image::destroy($request->id);

        return 'Success';
    }



}
