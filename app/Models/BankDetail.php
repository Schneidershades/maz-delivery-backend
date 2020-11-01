<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Bank\BankDetailResource;
use App\Http\Resources\Bank\BankDetailCollection;
use App\Models\User;

class BankDetail extends Model
{
    use HasFactory;


    public $oneItem = BankDetailResource::class;
    public $allItems = BankDetailCollection::class;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
