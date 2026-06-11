<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ReservationStatusNotification extends Notification
{
    use Queueable;

    public $reservation;

    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    public function via($notifiable)
    {
        return ['database']; // on stocke en base
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "Votre réservation du {$this->reservation->date_rdv} a été {$this->reservation->statut}.",
            'reservation_id' => $this->reservation->id,
        ];
    }
}