<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileTransaction extends Model
{
    use HasFactory;

    public $oneItem = MobileTransactionResource::class;
    public $allItems = MobileTransactionCollection::class;
}
