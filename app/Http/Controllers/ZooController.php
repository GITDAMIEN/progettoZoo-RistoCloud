<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\AnimalRequest;
use App\Http\Requests\NewCategoryRequest;

class ZooController extends Controller
{
    public function enlargeZoo()
    {
        $categories = Category::all();
        
        return view('enlargeZoo', compact('categories'));
    }

    public function addAnimal(AnimalRequest $request){

        $animal = Animal::create([
            "name" => $request->input("animalName"),
            "description" => $request->input("animalDescription"),
            "age" => $request->input("animalAge"),
            "image" => $request->file("animalImage") ? $request->file("animalImage")->store("public/images") : NULL,
            "category_id" => $request->input("category"),
        ]);

        return redirect()->route('allAnimals')->with('message', 'Hai inserito correttamente il nuovo animale');
    }

    public function addCategory(NewCategoryRequest $request){

        $category = Category::create([
            "name" => $request->input("newCategoryName"),
            "description" => $request->input("newCategoryDescription"),
            "image" => $request->file("newCategoryImage") ? $request->file("newCategoryImage")->store("public/images") : NULL,
        ]);

        return redirect()->route('allAnimals')->with('message', 'Hai inserito correttamente la nuova categoria');
    }

    public function editAnimal(Animal $animal){

        $categories = Category::all();

        return view('editAnimal', compact('animal', 'categories'));
    }

    public function confirmAnimalEdit(Animal $animal, AnimalRequest $request){

        $animal->name = $request->input('animalName');
        $animal->description = $request->input('animalDescription');
        $animal->age = $request->input('animalAge');
        $animal->image = $request->file("animalImage") ? $request->file("animalImage")->store("public/images") : NULL;
        $animal->category_id = $request->input('category');
        $animal->save();

        return redirect()->route('animalDetails', compact('animal'))->with('message', 'Animale modificato correttamente');
    }

    public function deleteAnimal(Animal $animal){

        $animal->delete();
        
        return redirect()->route('allAnimals')->with('message', 'Animale eliminato correttamente');
    }
}
