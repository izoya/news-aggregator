<?php


namespace App\Services;


use App\Models\User;
use Auth;
use Illuminate\Database\QueryException;
use Laravel\Socialite\Contracts\User as SocialiteData;

class SocialiteService
{
    /**
     * Method saves new user.
     * If user with given email is already exists,
     * method refresh name field using social service data.
     * @param SocialiteData $data
     * @return User|null
     */
    public function saveUser(SocialiteData $data): ?User
    {
        $email = $data->getEmail();

        $user = User::where('email', $email)->firstOrNew();

        $user->name = $data->getName();
        $user->email = $email;

        try {
            $user->save();
        }
        catch (QueryException $e) {

            return null;
        }

        return $user;
    }
}
