<?php

namespace App\Notifications;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCompanyNotification extends Notification
{
    use Queueable;

    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Company Added: ' . $this->company->name)
                    ->line('A new company has been added to the system:')
                    ->line('Name: ' . $this->company->name)
                    ->line('Email: ' . $this->company->email)
                    ->line('Website: ' . $this->company->website)
                    ->action('View Company', route('companies.show', $this->company))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
