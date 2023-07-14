<?php

namespace App\Mail;

use App\Jobs\SendTTCreationMails;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TTNotifMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $ticket;
    protected $messageMarkDown;
    protected $userData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket,$userData=null )
    {
        $this->ticket=$ticket;
        $this->userData=$userData;
    }

    protected function tt_details() : array {
        return $this->messageMarkDown =[
            __('models/tickets.fields.tt_number') . " : " . $this->ticket->tt_number,
             __('models/tickets.fields.site_id') . " : " . $this->ticket->site->site_id,
             __('models/tickets.fields.alarm_name') . " : " . $this->ticket->alarm->name,
             __('models/tickets.fields.description') . " : " . $this->ticket->description,
             __('models/tickets.fields.categ') . " : " . $this->ticket->tt_categ->name,
             __('models/tickets.fields.contractor') . " : " . $this->ticket->tt_contractor->name,
             __('models/tickets.fields.scope') . " : " . $this->ticket->tt_scope->name,
             __('models/tickets.fields.created_at') . " : " . $this->ticket->created_at,
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=[
            'messageMarkDown'=>$this->tt_details(),
            'ticket'=>$this->ticket,
            'userData'=>$this->userData
        ];
        // dd($data);
        $this->subject('OTC | TT Created Assigned To You | '. $this->ticket->tt_number)
                ->cc('eng.karim2010@gmail.com', 'Karim Saleh')
                ->view('tickets.mail',compact('data' ));
    }


}
