<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Services\SocialiteService;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class SocialiteController extends Controller
{
    protected $provider;

    public function redirectToProvider(string $provider)
    {
        // redirect if already logged in
        if (Auth::check()) {
            return redirect('login');
        }

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(string $provider, SocialiteService $service): RedirectResponse
    {
        try {
            $data = Socialite::driver($provider)->user();
        }
        catch (InvalidStateException $e) {

            return redirect()->route('login')->with('error', __('sessions.error.error'));
        }

        $user = $service->saveUser($data);

        if (!$user) {
            return back()->with('error', __('sessions.error.error'));
        }

        Auth::login($user);
        return redirect()->route('login');
    }
}
