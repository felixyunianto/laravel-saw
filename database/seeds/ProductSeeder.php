<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'product_name' => 'HP A',
                'price' => 3500000,
                'quality' => 70,
                'feature' => 10,
                'popular' => 80,
                'after_sales' => 3000,
                'strength' => 36
            ],
            [
                'product_name' => 'HP B',
                'price' => 4500000,
                'quality' => 90,
                'feature' => 10,
                'popular' => 60,
                'after_sales' => 2500,
                'strength' => 48
            ],
            [
                'product_name' => 'HP C',
                'price' => 4000000,
                'quality' => 80,
                'feature' => 9,
                'popular' => 90,
                'after_sales' => 2000,
                'strength' => 48
            ],
            [
                'product_name' => 'HP D',
                'price' => 4000000,
                'quality' => 70,
                'feature' => 8,
                'popular' => 50,
                'after_sales' => 1500,
                'strength' => 60
            ],
        ];

        foreach($products as $product){
            Product::create($product);
        }
    }
}
