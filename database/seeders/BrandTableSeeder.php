<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name' => 'Honda',
            'slug' => 'honda',
            'description' => 'Honda',
            'status' => 1,
        ]);

        DB::table('brands')->insert([
            'name' => 'Suzuki',
            'slug' => 'suzuki',
            'description' => 'Suzuki Motors',
            'status' => 1,
        ]);

        DB::table('brands')->insert([
            'name' => 'Bajaj',
            'slug' => 'bajaj',
            'description' => 'Bajaj Uttara Motors',
            'status' => 1,
        ]);
    }
}
