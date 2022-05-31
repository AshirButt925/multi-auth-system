<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function home(){
        return view('backend.admin.home');
    }

    public function createCustomer(){
        return view('backend.admin.customer.create');
    }
    public function getCustomers(Request $request){
        try {
            if ($request->ajax()) {
                $data = User::latest()->get();
                return Datatables::of($data)
                    ->addColumn('created_at', function ($row){
                        return Carbon::parse($row->created_at)->format('d M, Y H:i:s');
                    })
                    ->addColumn('actions', function ($row){
                      $btn = '<a href="javascript:void(0);"
                                data-name="'.($row->name).'"
                                data-email="'.($row->email).'"
                                data-id="'.(encrypt($row->id)).'"

                                class="btn btn-success btn-sm mx-2 editCustomer">
                                <i class="fa fa-edit"></i>
                              </a>';
                      $btn .= '<a href=""
                                data-id="'.(encrypt($row->id)).'"
                                class="btn btn-danger btn-sm mx-2 deleteCustomer">
                                <i class="fa fa-trash"></i></a>';
                      return $btn;
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
            }
        }catch (\Exception $e){
            return response()->json([
               'code' => 100,
               'message' => $e->getMessage()
            ]);
        }
    }

    public function storeCustomer(Request $request){
        try {
            $id = null;
            $message = "Customer updated successfully!";
            if(!isset($request['id']) || $request['id'] == null){
                $message = "New Customer created successfully!";
                $validateArray['name'] = ['required', 'string'];
                $validateArray['email'] = ['required', 'string', 'unique:users'];
                $validator = Validator::make($request->all(), $validateArray);
                if ($validator->fails()) {
                    $message = $validator->messages()->first();
                    return response()->json([
                        'code' => 100,
                        'message' => $message
                    ]);
                }
            }else{
                $id = decrypt($request['id']);
            }

            User::updateOrCreate(
                ['id' => $id],
                [
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make('12345678')
                ]
            );
            return response()->json([
                'code' => 200,
                'message' => $message
            ]);
        }catch (\Exception $e){
            return response()->json([
                'code' => 100,
                'message' => $e->getMessage()
            ]);
        }

    }

    public function deleteCustomer(Request $request){
        try {
            $validateArray['id'] = ['required', 'string'];
            $validator = Validator::make($request->all(), $validateArray);
            if ($validator->fails()) {
                $message = $validator->messages()->first();
                return response()->json([
                    'code' => 100,
                    'message' => $message
                ]);
            }
            $id = decrypt($request['id']);
            User::destroy($id);
            return response()->json([
                'code' => 200,
                'message' => "Customer delete successfully!"
            ]);
        }catch (\Exception $e){
            return response()->json([
                'code' => 100,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getOrders(){
        $orders = Order::all();
        return view('backend.admin.order.index', get_defined_vars());
    }
}
