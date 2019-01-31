<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $userNameCookie = cookie('userName',Auth::user()->name, 6);
        return response()->view('home')->cookie($userNameCookie);
    }
    //response nobre de la cookie valor y tiempo de duracion en nuestro navegador 60 minutos
    /* return response('')->cookie('cookie','valor',60); */
    /*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);
        return view(‘some.view’);
    }
    */
}
