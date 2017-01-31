<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\House;
use App\Model\HouseImage;

class HouseController extends Controller
{
  public function HouseApi() {
      $data = House::paginate(3);
      return response()->json(['model' => $data]);
  }

  public function ViewHouseApi(Request $request) {
    $data = HouseImage::where('house', '=', $request->id)->paginate(100);
    return response()->json(['model' => $data]);
  }

  public function ViewHouseNameApi(Request $request) {
    $data = House::where('id', '=', $request->id)->first();
    return response()->json(['model' => $data]);
  }

}
