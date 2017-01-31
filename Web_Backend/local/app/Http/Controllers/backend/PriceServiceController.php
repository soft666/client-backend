<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Price;
use App\Model\Service;

class PriceServiceController extends Controller
{
    
	public function getPrice() {

		return view('backend.price');

	}

	public function getViewData() {

		$data = Price::paginate(15);

		return response()->json(['model' => $data]);
	}

	public function postCreatePrice(Request $request) {

		$req = [
			'typename' 	=> 'required',
			'count'		=> 'required',
			'price'		=> 'required'
		];

		$msg = [
			'typename.required' => 'กรุณากรอก ประเภท',
			'count.required' => 'กรุณากรอก จำนวนคน',
			'price.required' => 'กรุณากรอก ค่าเช่ารายวัน '
		];
		
		$validator = \Validator::make($request->all(), $req, $msg);

		if($validator->fails()) {

			return response()->json(['msg' => $validator->messages(), 'status' => 'false']);

		} else {

			$model = new Price;
			$model->typename = $request->typename;
			$model->count = $request->count;
			$model->price = $request->price;
			$model->save();

		}
	}

	public function postRemovePrice(Request $request){
		return Price::destroy($request->id);
	}

	public function getService() {
		return view('backend.service');
	}
 
	public function getViewService() {

		$data = Service::paginate(15);

		return response()->json(['model' => $data]);
	}

	public function postCreateService(Request $request) {

		$req = [
			'name' 	=> 'required',
		];

		$msg = [
			'name.required' => 'กรุณากรอก บริการ',
		];
		
		$validator = \Validator::make($request->all(), $req, $msg);

		if($validator->fails()) {

			return response()->json(['msg' => $validator->messages(), 'status' => 'false']);

		} else {

			$model = new Service;
			$model->name = $request->name;
			$model->save();

		}
	}

	public function postRemoveService(Request $request) {
		return Service::destroy($request->id);
	}

}
