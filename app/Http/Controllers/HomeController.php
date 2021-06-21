<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bureau;
use DB;
use Stdfn;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
		
		// Stdfn::SaveRequestData($request->url(), $request->getQueryString());
		
    }

	
    public function welcome()
    {
		
        return view('welcome');
		
    }
	
	
	
    public function index()
    {
		
        return view('home');
		
    }
	
	
	
}
