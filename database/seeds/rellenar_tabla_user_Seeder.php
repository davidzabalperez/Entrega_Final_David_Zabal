<?php

use Illuminate\Database\Seeder;

class rellenar_tabla_user_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
        
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(5).'@gmail.com',
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
