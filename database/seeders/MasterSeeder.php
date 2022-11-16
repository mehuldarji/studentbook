<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  DB;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master')->insert([
            'name' => 'Product',
            'type' => 'category',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'Service',
            'type' => 'category',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'Billing Address',
            'type' => 'address_type',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'Shipping Address',
            'type' => 'address_type',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'Registered Address',
            'type' => 'address_type',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'GST',
            'type' => 'tax',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'TIN',
            'type' => 'tax',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'PAN',
            'type' => 'tax',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'Daily',
            'type' => 'uom',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'Hourly',
            'type' => 'uom',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'Monthly',
            'type' => 'uom',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'Annual',
            'type' => 'uom',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'Project Manager',
            'type' => 'role',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'Team Member',
            'type' => 'role',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('master')->insert([
            'name' => 'Consultant',
            'type' => 'role',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
