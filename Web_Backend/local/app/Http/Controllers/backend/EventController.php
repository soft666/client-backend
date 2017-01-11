<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Image;
use App\Model\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function getEvent() {
      return view('backend.event');
    }

    public function postAddEvent(Request $request) {
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
                  $im->type = 'event';
                  $im->save();
              }
              return 'success';
          }

      } else {
          return 'error';
      }
    }

    public function getViewEvent() {
          $data = Image::where('type', '=', 'event')->paginate(100);
          return response()->json(['model' => $data]);
    }

    public function postRemoveEvent(Request $request) {

        $model = Image::find($request->id);
        $PathDir = new Image;
        $destinationPath = $PathDir->PathSaveImage();
        Storage::delete($destinationPath . $model->name);
        Image::destroy($request->id);

        return 'Success';
    }

    public function postEventText(Request $request) {

      $count = Event::count();
      if($count == 1) {
        Event::where('count', '=', '1')
                   ->update(['text' => $request->eventtext ]);
      } else {
        $db = new Event;
        $db->text = $request->eventtext;
        $db->count = 1;
        $db->save();
      }
    }
}
