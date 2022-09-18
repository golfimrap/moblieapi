<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MobilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mobiles')->insert([
            [
                'brands'    => 'Nokia',
                'models'    => '3310',
                'price'     => 3000
            ],
            [
                'brands'    => 'Samsung',
                'models'    => 'A71',
                'price'     => '9000'
            ],
            [
                'brands'    => 'iPhone',
                'models'    => '5c',
                'price'     => '200'
            ]
        ]);
    }
}
