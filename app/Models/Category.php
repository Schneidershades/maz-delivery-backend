<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\CategoryCollection;

class Category extends Model
{
    use HasFactory;


    public $oneItem = CategoryResource::class;
    public $allItems = CategoryCollection::class;
}
