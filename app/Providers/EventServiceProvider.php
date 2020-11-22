<?php

namespace App\Providers;

use App\Events\ParseNewsEvent;
use App\Listeners\LastLoginUpdateListener;
use App\Listeners\ParsedNewsSaveListener;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Login::class => [
            LastLoginUpdateListener::class,
        ],
        ParseNewsEvent::class => [
            ParsedNewsSaveListener::class,
        ],
        SocialiteWasCalled::class => [
            'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
            'SocialiteProviders\\Facebook\\FacebookExtendSocialite@handle',

        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
