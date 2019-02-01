<?php

namespace App\Notifications;
use App\Notifications\MailResetPasswordToken;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordToken extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        return (new MailMessage)
                    ->greeting('halo boskuhh')

                    ->salutation('Best regards, Sulistyo Ardani !')
                    ->from('sulistyoardani@gmail.com', 'Admin Sulis')
                    ->subject("FORGOT PASSWORD TESTING")
                    ->line("Halo, kamu lupa password akun mu? Klik tombol dibawah untuk reset password.")
                    ->action('Reset Password', url('password/reset', $this->token))
                    ->line('Terimakasih :))');
    }

}
