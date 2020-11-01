<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    use HasFactory;


    public $oneItem = BankDetailResource::class;
    public $allItems = BankDetailCollection::class;
}
