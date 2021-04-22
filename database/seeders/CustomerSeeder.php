<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $companies = [
            ['name' => 'Pluto Company'], 
            ['name' => 'Meteor Ltd.'], 
            ['name' => 'Universe Co.']
        ];

        DB::table('customers')->insert($companies);
    }
}
