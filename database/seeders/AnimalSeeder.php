<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $animals = [
            [
                'name' => 'Ippopotamo',
                'category_id' => '1',
                'description' => 'Animale acquatico ciccione',
                'age' => '7',
                'image' => 'public/images/ippopotamo.jpeg'
            ],
            [
                'name' => 'Scimpanzè',
                'category_id' => '3',
                'description' => 'Mangiatore seriale di banane',
                'age' => '5',
                'image' => 'public/images/Scimpanzé.jpeg'
            ],
            [
                'name' => 'Fenicottero',
                'category_id' => '2',
                'description' => 'Uccello rosa (volante)',
                'age' => '3',
                'image' => 'public/images/fenicottero.jpeg'
            ],
            [
                'name' => 'Coccodrillo',
                'category_id' => '1',
                'description' => 'Il coccodrillo come fa? Non c\'è nessuno che lo sa',
                'age' => '8',
                'image' => 'public/images/coccodrillo.jpeg'
            ],
            [
                'name' => 'Elefante',
                'category_id' => '3',
                'description' => 'Animale enorme con proboscite',
                'age' => '15',
                'image' => 'public/images/elefante.jpeg'
            ],
            [
                'name' => 'Giraffa',
                'category_id' => '3',
                'description' => 'Il collo più lungo della savana',
                'age' => '4',
                'image' => 'public/images/giraffa.jpeg'
            ],
            [
                'name' => 'Rinoceronte',
                'category_id' => '3',
                'description' => 'L\animale più cornificato dello zoo',
                'age' => '10',
                'image' => 'public/images/rinoceronte.jpeg'
            ],
            [
                'name' => 'Camaleonte',
                'category_id' => '3',
                'description' => 'Se lo vedi, è già troppo tardi',
                'age' => '2',
                'image' => 'public/images/camaleonte.jpeg'
            ],
            [
                'name' => 'Gazzella',
                'category_id' => '3',
                'description' => 'Ogni mattina, in Africa, una gazzella si alza e sa che deve correre più veloce del leone. Non da RistoZoo.',
                'age' => '6',
                'image' => 'public/images/Gazzella.jpeg'
            ],
            [
                'name' => 'Crotalo',
                'category_id' => '3',
                'description' => 'Non importa che tu sia un crotalo o un pavone, l\'importante è che se muori me lo dici prima',
                'age' => '9',
                'image' => 'public/images/crotalo.jpeg'
            ],
            [
                'name' => 'Mantide religiosa',
                'category_id' => '4',
                'description' => 'In realtà non sappiamo se prega o bestemmia',
                'age' => '1',
                'image' => 'public/images/mantide religiosa.jpeg'
            ],
            [
                'name' => 'Charmander',
                'category_id' => '5',
                'description' => 'Da grande vuole essere un Charizard',
                'age' => '1',
                'image' => 'public/images/charmander.png'
            ],
        ];

        foreach($animals as $animal){
            Animal::create([
                "name" => $animal['name'],
                "category_id" => $animal['category_id'],
                "description" => $animal['description'],
                "age" => $animal['age'],
                "image" => $animal['image'],
            ]);
        }

    }
}
