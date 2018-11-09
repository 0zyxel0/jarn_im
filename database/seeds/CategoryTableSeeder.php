<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                'category_id'  => \Faker\Provider\Uuid::uuid(),
                'name'         => 'Fertilizer',
                'updated_by'              => 'Seeder',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );

        DB::table('categories')->insert(
            [
                'category_id'  => \Faker\Provider\Uuid::uuid(),
                'name'         => 'Materials',
                'updated_by'              => 'Seeder',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );

        DB::table('categories')->insert(
            [
                'category_id'  => \Faker\Provider\Uuid::uuid(),
                'name'         => 'Rice',
                'updated_by'              => 'Seeder',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );

        DB::table('categories')->insert(
            [
                'category_id'  => \Faker\Provider\Uuid::uuid(),
                'name'         => 'Corn',
                'updated_by'              => 'Seeder',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );

        DB::table('categories')->insert(
            [
                'category_id'  => \Faker\Provider\Uuid::uuid(),
                'name'         => 'Insecticides',
                'updated_by'              => 'Seeder',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );

        DB::table('categories')->insert(
            [
                'category_id'  => \Faker\Provider\Uuid::uuid(),
                'name'         => 'Gas',
                'updated_by'              => 'Seeder',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );

    }
}
