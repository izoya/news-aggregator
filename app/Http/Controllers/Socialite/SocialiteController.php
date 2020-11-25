<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Services\SocialiteService;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class SocialiteController extends Controller
{
    protected $provider;

    public function redirectToProvider(string $provider)
    {

            return redirect('login');
        }

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(string $provider)
    {
        try {
            $user = Socialite::driver($provider)->user();

        } catch (InvalidStateException $e) {
            return redirect()->route('login')->with('error', 'Error occured.');
        }
        (new SocialiteService())->saveUser($user);

        return redirect()->route('login');
    }

}
