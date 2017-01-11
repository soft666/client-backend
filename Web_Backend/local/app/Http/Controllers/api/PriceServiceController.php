<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Price;
use App\Model\Service;

class PriceServiceController extends Controller
{

  public function priceApi() {
    $data = Price::paginate(15);
    return response()->json(['model' => $data]);
  }

  public function serviceApi() {
    $data = Service::paginate(15);
    return response()->json(['model' => $data]);
  }

}
