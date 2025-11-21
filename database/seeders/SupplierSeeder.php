<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;
use App\Models\User;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::factory()->count(10)->create();
        
        $faker = \Faker\Factory::create();
        foreach(Supplier::all() as $supplier) {
            $user = User::inRandomOrder()->take(1)->first();
            $supplier->editors()->attach($user);
            $user->assignRole('editor');
        }
    }
}
