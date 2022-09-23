<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\NewAnimalRequest;
use App\Http\Requests\NewCategoryRequest;

class ZooController extends Controller
{
    public function manageZoo()
    {
        $categories = Category::all();
        $animals = Animal::orderBy('created_at', 'DESC')->paginate(16);
        
        return view('manageZoo');
    }

    public function addAnimal(NewAnimalRequest $request){

        // $request->validate();

        $animal = Animal::create([
            "name" => $request->input("newAnimalName"),
            "description" => $request->input("newAnimalDescription"),
            "age" => $request->input("newAnimalAge"),
            "image" => $request->file("newAnimalImage")->store("public/images"),
            "category_id" => $request->input("category"),
        ]);

        return redirect()->route('allAnimals')->with('message', 'Hai inserito correttamente il nuovo animale');
    }

    public function addCategory(NewCategoryRequest $request){

        // $request->validate();

        $category = Category::create([
            "name" => $request->input("newCategoryName"),
            "description" => $request->input("newCategoryDescription"),
            "image" => $request->file("newCategoryImage")->store("public/images"),
        ]);

        return redirect()->route('allAnimals')->with('message', 'Hai inserito correttamente la nuova categoria');
    }
}
