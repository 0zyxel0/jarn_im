<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Provider\Uuid;


class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert(
            [
                'id'  => Uuid::uuid(),
                'company_name'         => 'The Polka Dot Bear Tavern',
                'address'              => '1244 Milford Street Dover, NH 03820',
                'contact_person'       => 'Kevin M. Paterson',
                'contact_number'       => '603-767-0257',
                'updated_by' => 'Seeder',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );

        DB::table('suppliers')->insert(
            [
                'id'  => Uuid::uuid(),
                'company_name'         => 'Club Wholesale',
                'address'              => '2824 Buck Drive Mount Holly, VT 05758',
                'contact_person'       => 'Jesus S. Kovar',
                'contact_number'       => '802-259-6226',
                'updated_by' => 'Seeder',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );

        DB::table('suppliers')->insert(
            [
                'id'  => Uuid::uuid(),
                'company_name'         => 'Universal Design Partners',
                'address'              => '4377 South Street Pecos, TX 79772',
                'contact_person'       => 'William J. Orellana',
                'contact_number'       => '432-722-3296',
                'updated_by' => 'Seeder',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );

        DB::table('suppliers')->insert(
            [
                'id'  => Uuid::uuid(),
                'company_name'         => 'Intelli Wealth Group',
                'address'              => '4118 Hope Street Portland, OR 97205',
                'contact_person'       => 'Prince L. Amore',
                'contact_number'       => '971-344-5064',
                'updated_by' => 'Seeder',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );

        DB::table('suppliers')->insert(
            [
                'id'  => Uuid::uuid(),
                'company_name'         => 'Sunburst Garden Management',
                'address'              => '4625 Wildwood Street Salem, OH 44460',
                'contact_person'       => 'Erik L. Weber',
                'contact_number'       => '330-692-3984',
                'updated_by' => 'Seeder',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ]
        );

    }
}
