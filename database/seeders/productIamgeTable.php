<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\productImage;
use Faker\Factory as Faker;

class productIamgeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach(range(1, 70 ) as $index){
            productImage::create([
                'image'=>$faker->imageUrl(),
                 'ProductsId'=>$faker->numberBetween(1,100),
         ]);
    }
}
}
