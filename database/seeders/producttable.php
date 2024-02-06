<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;
use Faker\Factory as Faker;

class producttable extends Seeder
{
    public function run()
    {
        // Insert sample data
        $faker = Faker::create();
        foreach(range(1, 100 ) as $index){
            product::create([
                'name'=>$faker->name,
                 'description'=>$faker->name,
                 'price'=>123.23,
                 'digitalFilePath'=>$faker->name,
                 'stockQuantity'=>rand(10,100),
                 'image'=>$faker->image,
         ]);
        }






        // Add more data as needed
    }
}
