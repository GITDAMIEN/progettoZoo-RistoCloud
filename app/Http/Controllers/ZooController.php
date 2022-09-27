<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\AnimalRequest;
use App\Http\Requests\CategoryRequest;

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

        return redirect()->route('allAnimals')->with('message', 'Animale aggiunto correttamente');
    }

    public function addCategory(CategoryRequest $request){

        $category = Category::create([
            "name" => $request->input("categoryName"),
            "description" => $request->input("categoryDescription"),
            "image" => $request->file("categoryImage") ? $request->file("categoryImage")->store("public/images") : NULL,
        ]);

        return redirect()->route('allCategories')->with('message', 'Categoria aggiunta correttamente');
    }

    public function editAnimal(Animal $animal){

        $categories = Category::all();

        return view('editAnimal', compact('animal', 'categories'));
    }

    public function editCategory(Category $category){

        return view('editCategory', compact('category'));
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

    public function confirmCategoryEdit(Category $category, CategoryRequest $request){

        $category->name = $request->input('categoryName');
        $category->description = $request->input('categoryDescription');
        $category->image = $request->file("categoryImage") ? $request->file("categoryImage")->store("public/images") : NULL;
        $category->save();

        return redirect()->route('allCategories')->with('message', 'Categoria modificata correttamente');
    }

    public function deleteAnimal(Animal $animal){

        $animal->delete();
        
        return redirect()->route('allAnimals')->with('message', 'Animale eliminato correttamente');
    }

    public function deleteCategory(Category $category){

        $category->delete();
        
        return redirect()->route('allCategories')->with('message', 'Categoria eliminata correttamente');
    }
}
