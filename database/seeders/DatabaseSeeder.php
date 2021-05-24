<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::create(['name'=>'Nature']);
    	Category::create(['name'=>'Wildlife']);
    	Category::create(['name'=>'People']);
    	Category::create(['name'=>'Technology']);
    	Category::create(['name'=>'Animals']);
    	Category::create(['name'=>'Underwater']);
    	Category::create(['name'=>'Night']);
    	Category::create(['name'=>'Creative']);
    	Category::create(['name'=>'Landscape']);
    	Category::create(['name'=>'Architecture']);
    }
}
