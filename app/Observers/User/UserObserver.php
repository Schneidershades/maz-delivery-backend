<?php


namespace App\Observers\User;

use App\Models\User;

class UserObserver
{
    public function creating(User $user)
    {
    	if($user->password){
    		$user->password = bcrypt($user->password);
    	}
        // $user->remember_token = dechex(time()).bin2hex(random_bytes(10));
    }
}
