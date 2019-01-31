<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::where('receiver_id', Auth::user()->id)->get();
        return view('message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id','!=', Auth::user()->id)->get();
        return view('message.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'receiver_id'=>'required|string',
            'text' => 'required|min:5'
        ],[
            'receiver_id.string' => 'introduce un texto',
            'receiver_id.required' => 'este campo es requerido',
            'text.required' => 'este campo es requerido',
            'text.min' => 'minimo 5 caracteres',
        ]);
        $message = new Message();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $request->input('receiver_id');
        $message->text = $request->input('text');
        $message->save();
        return redirect('/message')->with('success', 'Mensaje enviado'); 


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
     return redirect('/message')->with('success', 'Mensaje eliminado correctamente');
    }
}
