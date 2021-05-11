<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Customers;
use DataTables;

class DashboardController extends Controller{
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(){
		return view('user.customers');
	}

	public function customersList(Request $request){
		// $data = Customers::latest()->get();
		// return datatables::of($data)->make(true);
		if ($request->ajax()) {
			$data = Customers::latest()->get();

            foreach ($data as $key => $val) {
                $created_data = $val->created_at;
                $splitTimeStamp = explode(" ",$created_data);
                $date = date("m-d-Y", strtotime($splitTimeStamp[0]));
                $data[$key]['dateUk'] = $date;
            }

			return datatables::of($data)->make(true);
			
            // $data = Customers::latest()->get();
            // return Datatables::of($data)
            //         ->addIndexColumn()
            //         ->addColumn('action', function($row){
   
            //                $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
            //                 return $btn;
            //         })
            //         ->rawColumns(['action'])
            //         ->make(true);
        }
		return view('user.customers');
	}
}
