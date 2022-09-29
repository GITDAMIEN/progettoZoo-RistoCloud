<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Mail\ThanksMail;
use App\Models\Category;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\AnimalSearchRequest;

class PublicController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    
    public function aboutUs()
    {
        return view('aboutUs');
    }
    
    public function contactUs()
    {
        return view('contactUs');
    }
    
    public function allAnimals(Request $request)
    {
        $allAnimals = Animal::where('age', '>=' , $request->input('minAgeSearch') ?? '0')
                            ->where('age', '<=' , $request->input('maxAgeSearch') ?? '99999')
                            ->where('description', 'LIKE', "%". $request->input('descriptionSearch') . "%")
                            ->where('name', 'LIKE', "%". $request->input('nameSearch') . "%")
                            ->where('category_id', 'LIKE', "%". $request->input('categorySearch') . "%")
                            ->orderBy(
                                ($request->input('orderBy') == 'a2z' || $request->input('orderBy') == 'z2a') ? 'name' : 'age',
                                ($request->input('orderBy') == 'a2z' || $request->input('orderBy') == 'young2old') ? 'ASC' : 'DESC')
                            ->get();
        
        $allCategories = Category::all();
        
        return view('allAnimals', compact('allAnimals', 'allCategories'));
    }
    
    public function allCategories()
    {
        // $allCategories = Category::orderBy('created_at', 'DESC')->paginate(16);
        $allCategories = Category::all();
        
        return view('allCategories', compact('allCategories'));
    }
    
    public function animalDetails(Animal $animal)
    {        
        return view('animalDetails', compact('animal'));
    }
    
    public function contactForm(ContactRequest $request)
    {
        // $request->validate();
        
        Mail::to($request->email)->send(new ThanksMail($request));
        Mail::to('amministrazione@ristozoo.it')->send(new ContactMail($request));
        
        return redirect()->route('welcome')->with('message','Grazie per averci contattato! Ti risponderemo via email molto presto!');
    }
    
}
