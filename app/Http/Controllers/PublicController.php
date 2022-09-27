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
    
    public function allAnimals()
    {
        $allAnimals = Animal::orderBy('created_at', 'DESC')->paginate(16);
        $allCategories = Category::all();
        $modifyMod = false;
        
        return view('allAnimals', compact('allAnimals', 'allCategories', 'modifyMod'));
    }
    
    public function allCategories()
    {
        $allCategories = Category::orderBy('created_at', 'DESC')->paginate(16);
        
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
