<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Image;
use App\Model\Contact;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function getContact() {
      return View('backend.contact');
    }

    public function postContact(Request $request) {

      $count = Contact::count();

      if ($count == 1) {
       Contact::where('name', '=', '1')
                  ->update(['address' => $request->address,
                                  'phone' => $request->phone,
                                  'line' => $request->line,
                                  'facebook' => $request->facebook,
                                  'email' => $request->email,
                                ]);
        if($request->file('image')) {

          $PathDir = new Image;
          $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
          $destinationPath = $PathDir->PathSaveImage();
          $request->file('image')->move($destinationPath, $imageName);
          $model = Contact::where('id', '=', '1')->first();
          Storage::delete($destinationPath . $model->imagemap);
          Contact::where('name', '=', '1')->update(['imagemap' => $imageName]);

          return $imageName;
        }

      } else {
        $db = new Contact;
        $db->name = '1';
        $db->address = $request->address;
        $db->phone = $request->phone;
        $db->line = $request->line;
        $db->facebook = $request->facebook;
        $db->email = $request->email;
        $db->imagemap = '';
        $db->googlemap = '';
        $db->save();
      }

      return $request->address;
    }

    public function getFromData() {
      return Contact::where('name', '=', '1')->first();
    }

}
