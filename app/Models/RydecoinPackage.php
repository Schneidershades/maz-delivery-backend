<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RydecoinPackage extends Model
{
    use HasFactory;

    public $oneItem = RydecoinPackageResource::class;
    public $allItems = RydecoinPackageCollection::class;
}
