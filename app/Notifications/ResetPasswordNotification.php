<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Filament\Notifications\Auth\ResetPassword as BaseResetPasswordNotification;
use Illuminate\Support\Facades\Lang;

class ResetPasswordNotification extends BaseResetPasswordNotification
{

    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Password Set Notification'))
            ->line(Lang::get('You are receiving this email because we registered your email for your account.'))
            ->action(Lang::get('Password Set'), $url)
            ->line(Lang::get('This password set link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('If you do not want to sign up, no further action is required.'));
    }
}
