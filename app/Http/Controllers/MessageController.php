<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
      $user = Auth::user();
      $messages_enviados= Message::where('from',$user->id)->orderBy('datetime', 'DESC')->get();
      $messages_recibidos= Message::where('to',$user->id)->orderBy('datetime', 'DESC')->get();
      return view('message.index',compact('messages_enviados','messages_recibidos'));
    }

    public function create()
    {
        return view('message.create');
    }

    public function store(Request $request)
    {
      $user = Auth::user();
      $men = new Message;
      $array_error=array();
      $userto=User::where('user',$request->input('to'))->first();

      if ($userto) {
        $men->message = $request->input('message');
        if (empty($men->message)) {
          $error=true;
          $array_error ['message']="El mensaje es vacio";
        }
        else {
          date_default_timezone_set('Europe/Madrid');
          $men->to = $userto->id;
          $men->from = $user->id;
          $men->datetime = date('Y-m-j H:i:s');
          $men->save();
          return redirect(route('messages.index'));
        }
      }
      else {
        $error=true;
        $array_error ['to']="El destinatario no existe";
      }

      if ($error) {
        return redirect(route('messages.create'))
               ->withInput()
               ->withErrors($array_error);
      }
    }

    public function show($id)
    {
        $user = Auth::user();
        $message= Message::find($id);
        $userfrom=User::find($message->from);

          return view('message.show')->with('message', $message)->with('user',$userfrom->user)->with('responder','0');
    }

    public function response($id)
    {
        $user = Auth::user();
        $message= Message::find($id);
        $userfrom=User::find($message->from);

          return view('message.show')->with('message', $message)->with('user',$userfrom->user)->with('responder','1');
    }

    public function edit($id)
    {
      $message= Message::find($id);
      $userfrom=User::find($message->to);

      return view('message.edit')->with('message', $message)->with('user',$userfrom->user);
    }

    public function update(Request $request, $id)
    {
        $message= Message::find($id);

        if (empty($request->input('message'))) {
          $array_error=array();
          $array_error ['message']="El mensaje es vacio";
          return redirect(route('messages.create'))
                 ->withInput()
                 ->withErrors($array_error);
        }
        else {
          date_default_timezone_set('Europe/Madrid');
          $message->message=$request->input('message');
          $message->datetime = date('Y-m-j H:i:s');
          $message->save();
          return redirect(route('messages.index'));
        }
    }

    public function destroy($id)
    {
        Message::destroy($id);
        return redirect(route('messages.index'));
    }
}
