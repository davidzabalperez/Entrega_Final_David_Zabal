<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meesage = new Message();
        $meesage->receiver_id = 1;
        $meesage->sender_id = 2;
        $meesage->text = 'Mensaje para probar';
        $meesage->save();
    }
}
