<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Setting\SettingResource;
use App\Http\Resources\Setting\SettingCollection;

class Setting extends Model
{
    use HasFactory;

    public $oneItem = SettingResource::class;
    public $allItems = SettingCollection::class;
}
