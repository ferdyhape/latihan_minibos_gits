<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        Product::create([
            "name" => "Rendang puasa",
            "description" => $faker->sentence(6),
            "stock" => $faker->numerify('##'),
            "image" => 'product-images/dummy-image.png',
            "category_id" => 1,
        ]);
        Product::create([
            "name" => "Rendang tidak puasa",
            "description" => $faker->sentence(6),
            "stock" => $faker->numerify('##'),
            "image" => 'product-images/dummy-image.png',
            "category_id" => 1,
        ]);
        Product::create([
            "name" => "Rendang mahal",
            "description" => $faker->sentence(6),
            "stock" => $faker->numerify('##'),
            "image" => 'product-images/dummy-image.png',
            "category_id" => 1,
        ]);
        Product::create([
            "name" => "Rendang tidak mahal",
            "description" => $faker->sentence(6),
            "stock" => $faker->numerify('##'),
            "image" => 'product-images/dummy-image.png',
            "category_id" => 1,
        ]);
        Product::create([
            "name" => "Es Bukan Teh",
            "description" => $faker->sentence(6),
            "stock" => $faker->numerify('##'),
            "image" => 'product-images/dummy-image.png',
            "category_id" => 2,
        ]);
        Product::create([
            "name" => "Teh tapi bukan es",
            "description" => $faker->sentence(6),
            "stock" => $faker->numerify('##'),
            "image" => 'product-images/dummy-image.png',
            "category_id" => 2,
        ]);
        Product::create([
            "name" => "Minuman dingin tapi panas",
            "description" => $faker->sentence(6),
            "stock" => $faker->numerify('##'),
            "image" => 'product-images/dummy-image.png',
            "category_id" => 2,
        ]);
    }
}
