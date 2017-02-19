<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        DB::table('users')->insert(
        	[
	            'name' => 'Riat Abduramani',
	            'email' => 'riat.abduramani@gmail.com',
	            'password' => bcrypt('forever'),
                'is_active' => 1,
                'confirmed' => 1,
	            'created_at' => date('Y-m-d H:i:s'),
	            'updated_at' => date('Y-m-d H:i:s'),
        	]
        );
    }
}
