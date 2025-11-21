<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Category;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('items')->truncate();

        Item::factory(50)->create();
        
        $faker = \Faker\Factory::create();
        foreach(Item::all() as $item) {
            $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $item->categories()->attach($categories);
        }
    }
}
