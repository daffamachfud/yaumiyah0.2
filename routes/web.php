<?php

use Illuminate\Support\Facades\Route;
use App\Models\Amalan;
use Carbon\Carbon;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home',[App\Http\Controllers\HomeController::class, 'handleAdmin'])->name('admin.route')->middleware('admin');

//amalan
Route::post('/insertAmalan', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $date = Carbon::now();
    $amalan = new Amalan;
    $amalan->name = $request->name;
    $amalan->user_id = Auth::user()->id;;
    $amalan->date = $date->toDateTimeString();
    $amalan->save();

    return redirect('/home');
});

Route::delete('/deleteAmalan/{id}', function ($id) {
    Amalan::findOrFail($id)->delete();

    return redirect('/home');
});