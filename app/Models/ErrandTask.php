<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrandTask extends Model
{
    use HasFactory;

    public $oneItem = ErrandResource::class;
    public $allItems = ErrandCollection::class;
}
