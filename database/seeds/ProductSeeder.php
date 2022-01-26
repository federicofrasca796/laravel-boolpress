<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newProduct = new Product();
            $newProduct->name = $faker->words(3, true);
            $newProduct->image = $faker->imageUrl(500, 400, 'Products');
            $newProduct->price = $faker->randomFloat(2, 100, 900);
            $newProduct->description = $faker->text();
            $newProduct->qty = $faker->randomNumber(2);
            $newProduct->save();
        }
    }
}