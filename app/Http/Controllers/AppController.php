<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
  public function __construct()
  {
      //$this->middleware('auth');
      $this->middleware('example', ['only'=>['index']]);
  }

  public function index()
  {
      return view('home');

    /* $userNameCookie = cookie('userName',Auth::user()->name, 60);
    return response()->view('home')->cookie($userNameCookie); */
  }
  public function getLogin(){
      return view('auth.login');
  }

  public function cambiarNombre(Request $request){

    $user=User::find($request->input('id'));
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->save();

    return redirect('/home');
    
  }
}
