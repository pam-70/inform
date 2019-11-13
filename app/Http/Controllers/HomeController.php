<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use PDF;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->status=='rokov'){
            $zapros=User::where('rukov_id',Auth::user()->id)
            ->orderBy('fio')
            ->get();
        
            return view('home')->with(['zapr' => $zapros]);
        }
        if(Auth::user()->status=='student'){
        
            return view('student');
        }





    }
 


}
