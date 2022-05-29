<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_product')->insert([
            [
                'product_id'  => "1",
                "category_id" => "1",
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'product_id'  => "1",
                "category_id" => "4",
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'product_id'  => "2",
                "category_id" => "1",
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'product_id'  => "2",
                "category_id" => "4",
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'product_id'  => "5",
                "category_id" => "2",
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'product_id'  => "5",
                "category_id" => "4",
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'product_id'  => "6",
                "category_id" => "2",
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'product_id'  => "6",
                "category_id" => "4",
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'product_id'  => "8",
                "category_id" => "3",
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'product_id'  => "8",
                "category_id" => "4",
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
        ]);
    }
}
