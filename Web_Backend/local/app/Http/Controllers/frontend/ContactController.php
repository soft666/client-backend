<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Contact;

class ContactController extends Controller
{
    
	public function getContact() {

		$db = Contact::find(1);

		return View('main.contact')->with('contact', $db);

	}

}
