<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
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
        DB::table('categories')->insert([
            [
                'name' =>'Phone',
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'name' =>'Computer',
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'name' =>'Tablet',
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'name' =>'Electronic',
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'name' =>'Fashion',
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
        ]);
    }
}
