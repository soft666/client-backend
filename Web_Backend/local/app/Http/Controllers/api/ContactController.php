<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Image;
use App\Model\Contact;

class ContactController extends Controller
{
  public function MapsApi() {
    $data = Contact::where('name', '=', '1')->first();
    return response()->json(['model' => $data]);
  }
}
