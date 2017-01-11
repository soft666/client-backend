<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Image;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{

    public function getMain() {
    	return view('backend.main');
    }

    public function getSlide() {
        return view('backend.slide');
    }

    public function postSlide(Request $request) {

      $count = Image::where('type', '=', 'Slide')->count();

      if ($count == 5) {
        return response()->json(['errors' => 'ใส่รูปภาพได้ไม่เกิน 5 ภาพ']);
      } else {
        $this->validate($request,[
      		'image' => 'required|image|mimes:jpeg,jpg,png,bmp,svg,gif',
      	]);

          if ($request->hasFile('image')) {
              $im = new Image;
               $PathDir = new Image;
              $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
              $destinationPath = $PathDir->PathSaveImage();
              $request->file('image')->move($destinationPath, $imageName);

              $im->name = $imageName;
              $im->path = $destinationPath;
              $im->type = 'Slide';
              $im->save();
              return $request->file('image')->getClientOriginalExtension();
          } else {
              return response()->json(['errors' => 'ใส่รูปภาพได้ไม่เกิน 5 ภาพ']);
          }
      }
    }

    public function postRemoveSlide(Request $request) {

        $model = Image::find($request->id);
        $PathDir = new Image;
        $destinationPath = $PathDir->PathSaveImage();
        Storage::delete($destinationPath . $model->name);
        Image::destroy($request->id);

        return $destinationPath . $model->name;
    }

    public function getViewSlide() {

        $data = Image::where('type', '=', 'Slide')->paginate(5);
        return response()->json(['model' => $data]);

    }

    public function JsonSlide() {

      $db = Image::select('name')->where('type', '=', 'Slide')->get();

      return response()->json(['model' => $db]);

    }

}
