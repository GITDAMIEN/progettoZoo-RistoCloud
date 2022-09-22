<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];

    public function animals(){
        return $this->hasMany(Animal::class);
    }

    protected static function newFactory(){
        return CategoryFactory::new();
    }
}
