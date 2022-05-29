<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'        =>'Samsung S6',
                "price"       => 1500,
                "description" =>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda aperiam totam rem, nostrum tempore error accusantium amet.",
                "is_active"   => True,
                "is_home"     => True,
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'name'        =>'Samsung S7',
                "price"       => 2500,
                "description" =>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda aperiam totam rem, nostrum tempore error accusantium amet.",
                "is_active"   => True,
                "is_home"     => False,
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'name'        =>'IPhone 8',
                "price"       => 2700,
                "description" =>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda aperiam totam rem, nostrum tempore error accusantium amet.",
                "is_active"   => True,
                "is_home"     => True,
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'name'        =>'IPhone 9',
                "price"       => 1500,
                "description" =>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda aperiam totam rem, nostrum tempore error accusantium amet.",
                "is_active"   => True,
                "is_home"     => True,
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'name'        =>'Lenovo Ideapad',
                "price"       => 7500,
                "description" =>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda aperiam totam rem, nostrum tempore error accusantium amet.",
                "is_active"   => False,
                "is_home"     => False,
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'name'        =>'Apple Macbook Pro 13',
                "price"       => 15000,
                "description" =>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda aperiam totam rem, nostrum tempore error accusantium amet.",
                "is_active"   => True,
                "is_home"     => True,
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'name'        =>'Apple Macbook Air',
                "price"       => 1500,
                "description" =>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda aperiam totam rem, nostrum tempore error accusantium amet.",
                "is_active"   => True,
                "is_home"     => True,
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ],
            [
                'name'        =>'Samsung Galaxy Tab A8',
                "price"       => 2000,
                "description" =>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda aperiam totam rem, nostrum tempore error accusantium amet.",
                "is_active"   => True,
                "is_home"     => True,
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ]

        ]);
    }
}
