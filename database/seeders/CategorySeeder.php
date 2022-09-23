<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'name' => 'Animali acquatici',
                'description' => 'Animali che vivono nell\'acqua',
                'image' => 'public/images/animalimarini.webp'
            ],
            [
                'name' => 'Volatili',
                'description' => 'Animali che dominano i cieli',
                'image' => 'public/images/volatili.webp'
            ],
            [
                'name' => 'Animali di terra',
                'description' => 'Animali che camminano tra di noi',
                'image' => 'public/images/animaliTerra.jpeg'
            ],
            [
                'name' => 'Insetti',
                'description' => 'I più odiati di tutti',
                'image' => 'public/images/insetti.jpeg'
            ],
            [
                'name' => 'Fuoco',
                'description' => 'Solo i pokèmon possono appartenere a questa categoria',
                'image' => 'public/images/fuoco.png'
            ],
        ];

        foreach($categories as $category){
            Category::create([
                "name" => $category['name'],
                "description" => $category['description'],
                "image" => $category['image'],
            ]);
        }
    }
}
