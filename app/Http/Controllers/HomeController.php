<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Amalan;
use App\Models\User;

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
        $amalan = Amalan::whereDate('date', Carbon::today())->where('user_id',Auth::user()->id)->get();
        return view('home',['date' => $date, 'name' => $name, 'amalan' => $amalan]);
    }

    public function handleAdmin()
    {
        $users = User::where('is_admin', 0)->pluck('name', 'id');
        $amalan = Amalan::orderby('name')->get()->groupBy(function($item){
            return $item->user->name;
        });
        $date =  Carbon::now()->locale('id')->isoFormat('LL');
        // return $amalan;
        return view('handleAdmin',['users' => $users, 'amalan' => $amalan,'date' => $date]);
    }    
}
