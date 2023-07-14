<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\TTCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendTTCreationMailsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data = null)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $ttNotify = [
        //     'tt_number' => $this->ticket->tt_number,
        //     'body' => "TT (" . $this->ticket->tt_number . ") has assigned to you, Please check and do the needful",
        //     'ttDetails'=>$this->messageMarkDown,
        //     'thanks' => 'Thank you this is from ALKAN.KarimSaleh.com',
        //     'actionText' => 'Open TT',
        //     'actionURL' => url("/admin/tickets//".$this->ticket->id),
        //     'id' => $this->ticket->last_number
        // ];
        // \Notification::send( User::role('OTC')->chunk(10,function($xy){

        // foreach ($xy as $email) {

        // \Mail::to($email)->send(New \App\Mail\TTNotifMail($this->data) );
        // }
        // }), new TTCreated($ttNotify));
        // }), New \App\Mail\TTNotifMail($this->data));
            echo 'here before start Job :';
            User::role('OTC')->select('name','email')->chunk(10, function ($emails) {
            // dd($emails);
            foreach ($emails as $email) {
                // dd($email->email);
                try {
                    \Mail::to($email)->send(new \App\Mail\TTNotifMail($this->data,$email));
                } catch (\Throwable $e) {
                    dd($e->getMessage());

                    return false;
                }
                // echo 'email sent';
            }
        });
        return 'Will send mails in background you can do other things';

        // $this->subject('Test Mail')
        // ->view('tickets.mail');
    }
}
