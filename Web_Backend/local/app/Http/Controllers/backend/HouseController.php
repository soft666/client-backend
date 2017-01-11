<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\House;
use App\Model\Image;
use App\Model\HouseImage;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    public function getHouse() {
      return view('backend.house');
    }

    public function postHouse(Request $request) {

      $this->validate($request,[
        'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,bmp,svg,gif',
      ]);

      $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
      $PathDir = new Image;
      $destinationPath = $PathDir->PathSaveImage();
      // $request->file('image')->resize(300, 200)->move($destinationPath, $imageName);
      $img = \Image::make($request->file('image'))->resize(360, 272);
      $img->save($destinationPath.'/'.$imageName);

      $db = new House;
      $db->name = $request->name;
      $db->image = $imageName;
      $db->save();

    }

    public function ViewHouse() {
      $data = House::paginate(100);
      return response()->json(['model' => $data]);
    }

    public function postRemoveHouse(Request $request) {

        $model = House::where('id', '=', $request->id)->first();
        $PathDir = new Image;
        $destinationPath = $PathDir->PathSaveImage();
        Storage::delete($destinationPath . $model->image);
        $image = HouseImage::where('house', '=', $model->id)->get();

         foreach ($image as $key) {
             Storage::delete($destinationPath . $key->name);
             HouseImage::destroy($key->id);
         }

        House::destroy($request->id);
        return 'success';
    }

    public function getHouseView($id) {
        $model = House::find($id);
        return view('backend.houseview')->with('model', $model);
    }

    public function postAddHouseImage(Request $request) {
      if ($request->hasFile('image')) {

          foreach($request->image as $key) {
              for ($i=0; $i < $key; $i++) {

                  $imageName = time().$i.'.'.$request->file('image.'.$i)->getClientOriginalExtension();
                  $PathDir = new Image;
                  $destinationPath = $PathDir->PathSaveImage();
                  $request->file('image.'.$i)->move($destinationPath, $imageName);

                  $im = new HouseImage;
                  $im->name = $imageName;
                  $im->path = $destinationPath;
                  $im->house = $request->id;
                  $im->save();
              }
              return 'success';
          }

      } else {
          return 'error';
      }
    }

    public function getHouseImage($id) {
          $data = HouseImage::where('house', '=', $id)->paginate(100);
		      return response()->json(['model' => $data]);
    }

    public function postHouseImage(Request $request) {
        $model = HouseImage::find($request->id);
        $PathDir = new Image;
        $destinationPath = $PathDir->PathSaveImage();
        Storage::delete($destinationPath . $model->name);
        HouseImage::destroy($request->id);
        return 'Success';
    }
}
