<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Orders;
use DataTables;
use DB;

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
			// $data = Orders::latest()->get();
			$data = DB::table('customers')
	            ->join('orders','orders.customer_id','customers.id')
	            ->select(['customers.*' ,'orders.*'])
	            ->get();

			foreach ($data as $key => $value) {
				$status = $value->status;
				if($status == 1){
					$data[$key]->status = 'New';
				}else{
					$data[$key]->status = 'Processed';
				}
			}
			return datatables::of($data)
				->addColumn('action', function ($user) { return '<a href="/orders/dashboard/show/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye"></i> Show</a>';})
				->make(true);
        }
		return view('orders.orders');
	}

	public function show($id){
		$data = DB::table('customers')
			->join('orders','orders.customer_id','customers.id')
			->join('products','products.id','orders.product_id')
			->select(['customers.*' ,'orders.*', 'products.name as pname', 'products.price'])
			->where(['customers.id'=>$id])
			->get();
		return view('orders.show', compact('data', $data));
	}
}
