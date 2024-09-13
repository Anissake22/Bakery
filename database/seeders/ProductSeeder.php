<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = [
            [
                'name_product' => 'meskouta(orange cake)',
                'image' => 'img/moroccan-orange-cake-1200w-opt.jpg',
                'price' => 80,
                'category'=>'Cake'
            ],
            [
                'name_product' => 'meskouta(apple cake)',
                'image' => 'img/french-apple-tart-tarte-aux-pommesjpg.jpg',
                'price' => 90,
                'category'=>'Cake'
            ],
            [
                'name_product' => 'traditional Moroccan round bread',
                'image' => 'img/khobz.jpg',
                'price' => 11,
                'category'=>'Bread'
                
            ],
            [
                'name_product' => 'msemen',
                'image' => 'img/msemen.jpg',
                'price' => 20,
                'category'=>'Bread'
                
            ],
            [
                'name_product' => 'ghriba',
                'image' => 'img/ghriba.jpg',
                'price' => 40,
                'category'=>'Cookies'
            ],
            [
                'name_product' => 'feqas',
                'image' => 'img/feqas.jpg',
                'price' => 50,
                'category'=>'Cookies'
                
            ],
        
        ];
  
        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
    
}
