<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert(
            [
                'id'             => '1',
                'name'           => 'Admin',
                'description'          => 'Full Access',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
        DB::table('user_types')->insert(
            [
                'id'             => '2',
                'name'           => 'User',
                'description'          => 'Input and Update available features',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
    }
}
