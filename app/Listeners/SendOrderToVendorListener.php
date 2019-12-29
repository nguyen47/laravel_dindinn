<?php

namespace App\Listeners;

use App\Providers\NewOrderHasRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Order;

class SendOrderToVendorListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  NewOrderHasRegisteredEvent  $event
     * @return void
     */
    public function handle($event)
    {
        sleep(10);
        $order = new Order();
        $order->create($event->data);
    }
}
