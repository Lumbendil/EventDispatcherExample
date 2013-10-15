<?php

namespace Lumbendil\EventDispatcherExample;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class WelcomeMailer
{
    private $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param string[] $emails An array of emails.
     */
    public function sendEmails(array $emails)
    {
        $this->eventDispatcher->dispatch('welcome_mailer.mailer_start');

        foreach ($emails as $email) {
            $event = new GenericEvent();
            $event['email'] = $email;

            if ($this->sendEmail($email)) {
                $this->eventDispatcher->dispatch('welcome_mailer.send_successful', $event);
            } else {
                $this->eventDispatcher->dispatch('welcome_mailer.send_failed', $event);
            }
        }

        $this->eventDispatcher->dispatch('welcome_mailer.mailer_end');
    }

    /**
     * @param string $email The email of the user.
     * @return bool True if the email was sent successfully,
     *  false otherwise.
     */
    private function sendEmail($email)
    {
        $message = "Welcome $email";

        $event = new GenericEvent();
        $event['email'] = $email;
        $event['message'] = $message;

        $this->eventDispatcher->dispatch('welcome_mailer.mail_prepared', $event);
        $message = $event['message'];

        echo "Sending message to $email: $message", PHP_EOL;
        return true;
    }
}