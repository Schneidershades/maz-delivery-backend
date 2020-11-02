<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\CustomerPlateNumber;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Carbon\Carbon;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
	public function __construct()
    {
        parent::__construct(User::class);
    }

    public function allUsersRegistered()
    {
    	return User::whereNotNull('email')->latest()->get();
    }

    public function deleteUsersWithEmptyEmailOrPhone()
    {
    	// $deleteUsers = User::where('email', NULL)->where('phone', NULL)->get();
        $deleteUsers = User::where('email', '!=', NULL)->where('phone', NULL)->get();

    	foreach ($deleteUsers as $user) {
    		$user = User::find($user['id']);
    		$user->delete();
    	}
    }

    public function findDuplicateUserEmail()
    {
    	$deleteUsers = User::where('email')->havingRaw('count(*) > 1')->get();

    	return $deleteUsers;
    	// foreach ($deleteUsers as $user) {
    	// 	$user = User::find($user['id']);
    	// 	$user->delete();
    	// }
    }

    public function upperCase()
    {
    	$vehicles = CustomerPlateNumber::all();

    	foreach ($vehicles as $vehicle) {
    		$v = CustomerPlateNumber::find($vehicle['id']);
    		$v->plate_number = strtoupper($vehicle['plate_number']);
    		$v->save();
    	}
    }

    public function findDuplicateUserPhone()
    {
    	return User::select(['id', 'phone', 'email'])
                    ->distinct()
                    ->pluck('id')
                    ->toArray();
    }

    
	
	public function saveModel($request)
	{
		$user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password; 
        // $user->free_wash_status = true;
        $user->save();
	}

	public function findModelByLocationId($id)
	{
		return User::where('location_id', $id)->get();
	}

	public function findModelById($id)
	{
		return User::where('id', $id)->first();
	}

	public function updateModelById($id, $request)
	{
		$user = $this->findModelById($id);

		// update user incase the user wants to change the credentials
        if($request->first_name){
            $user->first_name = $request->first_name;
        }
        if($request->last_name){
            $user->last_name = $request->last_name;
        }
        if($request->identifier && !auth()->user()->identifier){
            $user->referral_identifier = $request->identifier;
        }

        if($request->email){
            $user->email = $request->email;
        }

        if($request->phone){
            $user->phone = $request->phone;
        }

        if($request->ssn){
            $user->ssn = $request->ssn;
        }

        if($request->dob){
            $user->dob = $request->dob;
        }

        if($request->zip_code){
            $user->zip_code = $request->zip_code;
        }

        if($request->address){
            $user->address = $request->address;
        }

        if($request->city_id){
            $user->city_id = $request->city_id;
        }

        if($request->country_id){
            $user->country_id = $request->country_id;
        }

        if($request->location_id){
            $user->location_id = $request->country_id;
        }

        $user->save();
	}

	public function deleteModelById($id)
	{
		$user = $this->findModelById($id);
		$user->delete();
	}

	public function changePasswordModelbyId($id, $request)
	{
		$user = $this->findModelById($id);
        $user->password = bcrypt($request->password);
        $user->save();
	}

	public function findModelEmail($email)
	{
		$user = User::where('email', $email)->first();

		if($user->email_verified_at != null){
            return $this->errorResponse('This user is already verified', 409);
        }
	}

	public function findModelIdentifier($referral)
	{
		return $user = User::where('referral_identifier', $referral)->first();
	}

	public function findModelByToken($token)
	{
		return $user = User::where('remember_token', $token)->first();
	}

	public function verifyUser($id)
	{
		$user = $this->findModelById($id);
		$user->email_verified_at = Carbon::now();
	    $user->remember_token = null;
	    $user->save();
	}

	public function userPauseInvestment($id, $request)
	{
		$user = $this->findModelById($id);
    	$user->pause_investment = $request->pause_investment;
    	$user->save();
    	return $user;
	}

	public function appNotification($id, $request)
	{
		$user = $this->findModelById($id);
    	$user->app_notification = $request->app_notification;
    	$user->save();
    	return $user;
	}

	public function twoFactorAuth($id, $request)
	{
		$user = $this->findModelById($id);
    	$user->two_factor_auth = $request->two_factor_auth;
    	$user->save();
    	return $user;
	}

	public function imageLink($id, $path)
	{
		$user = $this->findModelById($id);
    	$user->image = $path;
    	$user->save();
    	return $user;
	}

	public function setMultiplier($id, $request)
	{
		$user = $this->findModelById($id);
        $user->multiplier = $request->multiplier;
        $user->save();
	}

	public function findModelByPhone($phoneInput)
	{
		return User::where('phone', $phoneInput)->first();
	}

	public function findModelbyThisWeekDobAndLocationId($user)
	{
		$user = User::where('location_id', $user->location_id)->where('id', $user->id)->where('created_at', Carbon::today())->get();
	}

	public function updateUserPassword($user, $request)
	{
		$user = $this->findModelByEmail($user->email);
		$this->changePasswordModelbyId($user->id, $request);
	}

	public function findModelByEmail($email)
	{
		return $user = User::where('email', $email)->first();
	}
}