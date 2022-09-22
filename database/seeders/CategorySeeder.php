<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Database\Seeder;
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
                'image' => ''
            ],
            [
                'name' => 'Volatili',
                'description' => 'Animali che dominano i cieli',
                'image' => ''
            ],
            [
                'name' => 'Animali di terra',
                'description' => 'Animali che camminano tra di noi',
                'image' => ''
            ],
            [
                'name' => 'Insetti',
                'description' => 'I più odiati di tutti',
                'image' => ''
            ],
            [
                'name' => 'Fuoco',
                'description' => 'Solo i pokèmon possono appartenere a questa categoria',
                'image' => ''
            ],
        ];

        foreach($categories as $category){
            Category::create([
                "name" => $category['name'],
                "description" => $category['description'],
                "image" => $category['image'],
            ]);
        }

        // Category::factory()
        // ->has(Animal::factory())
        // ->create([
        //     [
        //         'name' => 'Animali acquatici',
        //         'description' => 'Animali che vivono nell\'acqua',
        //         'image' => ''
        //     ],
        //     [
        //         'name' => 'Volatili',
        //         'description' => 'Animali che dominano i cieli',
        //         'image' => ''
        //     ],
        //     [
        //         'name' => 'Animali di terra',
        //         'description' => 'Animali che camminano tra di noi',
        //         'image' => ''
        //     ],
        //     [
        //         'name' => 'Insetti',
        //         'description' => 'I più odiati di tutti',
        //         'image' => ''
        //     ],
        //     [
        //         'name' => 'Fuoco',
        //         'description' => 'Solo i pokèmon possono appartenere a questa categoria',
        //         'image' => ''
        //     ],
        // ]);
    }
}
