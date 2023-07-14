<?php

namespace App\Notifications;

use App\Models\User;
use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TTCreated extends Notification
{
    use Queueable;

    protected $TT;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($TT)
    {
        $this->TT=$TT;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // dd($notifiable);
        return (new MailMessage)

            ->cc('eng.karim2010@gmail.com', 'Karim Saleh')
            ->cc(Auth::user()->email,Auth::user()->name)
            ->subject('OTC | TT Created Assigned To You | '. $this->TT['tt_number'] )
            ->greeting('Dear ' . $notifiable->name . ',')
            ->line($this->TT['body'])
            ->lines($this->TT['ttDetails'])
            ->action($this->TT['actionText'], $this->TT['actionURL'])
            ->line($this->TT['thanks']);

            // ///
            // ->line($this->project['body'])
            // ->action($this->project['actionText'], $this->project['actionURL'])
            // ->line($this->project['thanks']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
