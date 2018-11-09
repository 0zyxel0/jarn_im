<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'id'             => '1',
                'name'           => 'Admin',
                'type'           => '1',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('123456'),
                'remember_token' => str_random(60),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );
    }
}
