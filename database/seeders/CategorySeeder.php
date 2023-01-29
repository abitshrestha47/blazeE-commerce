<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker::create();
        $categories = ['Electronics', 'Clothing', 'Mobiles', 'Shoes','Bags','Hats','Books','Music'];
        for ($i=0; $i <= 6; $i++) {
            DB::table('categories')->insert([
                'categories' => $faker->unique()->randomElement($categories),
            ]);
        }
    }
}
