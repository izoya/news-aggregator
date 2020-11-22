<?php


namespace App\Services;


use App\Models\User;
use Auth;
use Illuminate\Database\QueryException;
use Laravel\Socialite\Contracts\User as SocialiteData;

class SocialiteService
{
    public function saveUser(SocialiteData $data)
    {
        $email = $data->getEmail();
        $name = $data->getName();
        $user = User::where('email', $email)->firstOrNew();

        $user->email = $email;
        $user->name = $name;
        try {
            $user->save();
        } catch (QueryException $e) {
            //
        }
        Auth::login($user);

    }
}
