<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\Album;
use App\Model\Image;
use App\Model\Event;

class AlbumController extends Controller
{

  public function AlbumApi() {
      $data = Album::paginate(100);
      return response()->json(['model' => $data]);
  }

  public function ViewAlbumApi(Request $request) {
    $data = Image::where('type', '=', $request->id)->paginate(100);
    return response()->json(['model' => $data]);
  }

  public function ViewAlbumNameApi(Request $request) {
    $data = Album::where('id', '=', $request->id)->first();
    return response()->json(['model' => $data]);
  }

  public function ViewGalleryApi() {
    $data = Image::where('type', '=', 'gallery')->paginate(12);
    return response()->json(['model' => $data]);
  }

  public function ViewEventApi() {
    $data = Image::where('type', '=', 'event')->paginate(4);
    return response()->json(['model' => $data]);
  }

  public function ViewEventTextApi() {
    $data = Event::where('count', '=', '1')->paginate(4);
    return response()->json(['model' => $data]);
  }

}
