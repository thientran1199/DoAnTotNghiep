<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       /* DB::table('slide')->insert([
        	['name'=> 'slide1.png'],
        	['name'=> 'slide2.png'],
        	['name'=> 'slide3.png'],
        ]);*/
        DB::table('account')->insert(
            ['username'=>'customertest3','password' => bcrypt('12345'),'role'=>'customer'],
        );

    }
}
