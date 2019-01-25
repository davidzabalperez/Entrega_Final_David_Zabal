<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
