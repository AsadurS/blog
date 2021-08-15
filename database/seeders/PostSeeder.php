<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach(range(0,14) as $index){
         Post::create([
             'title'       => $slug=$faker->sentence,
             'slug'        => Str::slug($slug),
             'description' =>$faker->sentence,
             'image'       => ' ',
             'category_id' => Category::inRandomOrder()->first()->id,
         ]);
         }
    }
}
