<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Amalan;

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
        $date =  Carbon::now()->locale('id')->isoFormat('LL');
        $name = Auth::user()->name;
        $amalan = Amalan::whereDate('date', Carbon::today())->get();
        return view('home',['date' => $date, 'name' => $name, 'amalan' => $amalan]);
    }

    public function handleAdmin()
    {
        return view('handleAdmin');
    }    
}
