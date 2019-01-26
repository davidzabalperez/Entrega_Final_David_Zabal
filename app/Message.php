<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'receiver_id', 'text'
    ];
    public function user(){
        return $this->belongsTo('App\User','receiver_id','sender_id');
    }
    public function user_sender(){
        return $this->belongsTo('App\User', 'sender_id');
    }

    public function user_receiver(){
        return $this->belongsTo('App\User', 'receiver_id');
    }
}
