<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Factory::create();
       foreach(range(0,5) as $index){
        Category::create([
            'name'  => $name=$faker->name,
            'slug'  => Str::slug($name)
        ]);
        }
    }
}
