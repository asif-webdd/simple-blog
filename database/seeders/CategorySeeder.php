<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

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

        foreach (range(1, 5) as $index){
            Category::create([
                'user_id'=> rand(1, 11),
                'cat_name'=> substr($faker->paragraph, 0, 10),
                'cat_slug'=> substr($faker->paragraph, 0, 10),
                'cat_status'=> $this->cat_random_status(),
            ]);
        }
    }

    public function cat_random_status(){
        $c_status = [
          'active'=>'active',
          'inactive'=>'inactive'
        ];

        return array_rand($c_status, 1);
    }
}
