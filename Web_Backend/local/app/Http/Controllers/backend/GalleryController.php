<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Image;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function getGallery() {
      return view('backend.gallery');
    }

    public function postAddGallery(Request $request) {
      if ($request->hasFile('image')) {

          foreach($request->image as $key) {
              for ($i=0; $i < $key; $i++) {

                  $imageName = time().$i.'.'.$request->file('image.'.$i)->getClientOriginalExtension();
                  $PathDir = new Image;
                  $destinationPath = $PathDir->PathSaveImage();
                  $request->file('image.'.$i)->move($destinationPath, $imageName);

                  $im = new Image;
                  $im->name = $imageName;
                  $im->path = $destinationPath;
                  $im->type = 'gallery';
                  $im->save();
              }
              return 'success';
          }

      } else {
          return 'error';
      }
    }

    public function getViewGallery() {
          $data = Image::where('type', '=', 'gallery')->paginate(100);
          return response()->json(['model' => $data]);
    }

    public function postRemoveGallery(Request $request) {

        $model = Image::find($request->id);
        $PathDir = new Image;
        $destinationPath = $PathDir->PathSaveImage();
        Storage::delete($destinationPath . $model->name);
        Image::destroy($request->id);

        return 'Success';
    }
}
