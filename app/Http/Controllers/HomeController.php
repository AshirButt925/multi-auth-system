<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = Auth::user();
        if($user->type == 'admin'){
            return redirect()->route('admin.home');
        }elseif($user->type == 'customer') {
            return redirect()->route('customer.home');
        }
        abort('401');

    }
}
