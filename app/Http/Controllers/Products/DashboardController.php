<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Products;
use DataTables;

class DashboardController extends Controller{
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(){
		return view('products.products');
	}

	public function productsList(Request $request){
		if ($request->ajax()) {
			$data = Products::latest()->get();
			foreach ($data as $key => $value) {
				$status = $value->in_stock;
				if($status == 1){
					$data[$key]['status'] = 'In Stock';
				}else{
					$data[$key]['status'] = 'Out of Stock';
				}
			}
			return datatables::of($data)->make(true);
		}
		return view('products.products');
	}

}
