<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bakingschoolclasses;


class BakingschoolclassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'Description' => 'Become a home baker, and start your own home baking business',
                'name_class' => 'Home baker',
                'image' => 'img/home-baker.jpg'
                
            ],
            [
                'Description' => 'Become a professional baker, and land your first job in a bakery setting',
                'name_class' => 'Professional level',
                'image' => 'img/professional.jpg'
                
            ],
            [
                'Description' => 'Young cooks love making a mess with flour and eggs, so get them creating a delicious mess with our fun childrens baking class.',
                'name_class' => 'kids',
                'image' => 'img/kids.jpg'
                
            ],
         
            
        
        ];
  
        foreach ($classes as $key => $value) {
            Bakingschoolclasses::create($value);
        }
    }
}
