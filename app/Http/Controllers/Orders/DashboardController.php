<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Orders;
use DataTables;

class DashboardController extends Controller{
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(){
		return view('orders.orders');
	}

	public function ordersList(Request $request){
		if ($request->ajax()) {
			$data = Orders::latest()->get();
			return datatables::of($data)->make(true);
        }
		return view('orders.orders');
	}
}
