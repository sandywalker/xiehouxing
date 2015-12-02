<?php

namespace App\Listeners;

use App\Events\WxPayEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class WxPayEventListener
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
     * @param  WxPayEvent  $event
     * @return void
     */
    public function handle(WxPayEvent $event)
    {
        
        Log::debug('handle:'.$event->result);
    }
}
