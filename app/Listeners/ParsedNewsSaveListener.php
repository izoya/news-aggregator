<?php

namespace App\Listeners;

use App\Events\ParseNewsEvent;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\QueryException;
use Illuminate\Queue\InteractsWithQueue;
use Log;
use Str;

class ParsedNewsSaveListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(ParseNewsEvent $event)
    {

    }
}
