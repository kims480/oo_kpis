<?php

namespace App\Http\Livewire\Tickets;

use Livewire\Component;

class TicketHandler extends Component
{
    public $ticket;


    public function __construct($ticket = null) {
        $this->ticket = $ticket;
    }
    public function render()
    {
        return view('livewire.tickets.ticket-handler');
    }
}
