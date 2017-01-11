<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Service;


class PriceServiceController extends Controller
{
    
	public function getPrice() {

		$service = Service::all();

		return View('main.price')->with('service', $service);

	}


}
