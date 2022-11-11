<?php

namespace App\Listeners;

use App\Events\EventoNavegacao;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ContadorNavegacao
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
     * @param  \App\Events\EventoNavegacao  $event
     * @return void
     */
    public function handle(EventoNavegacao $event)
    {
        $event->product->qtd_acessos++;
        $event->product->save();
    }
}
