<?php


namespace App\Observers\User;

use App\Models\User;
use App\Models\Wallet;

class UserObserver
{
    public function creating(User $user)
    {
    	if($user->password){
    		$user->password = bcrypt($user->password);
    	}
        // $user->remember_token = dechex(time()).bin2hex(random_bytes(10));
    }

    public function created(User $user)
    {
        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->save();
    }

    public function retrieved(User $user)
    {
    	if(!$user->wallet){
    		$wallet = new Wallet;
        	$wallet->user_id = $user->id;
        	$wallet->save();
    	}

    }
}

