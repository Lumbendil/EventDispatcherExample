<?php

namespace Lumbendil\EventDispatcherExample;

class WelcomeMailer
{
    /**
     * @param string[] $emails An array of emails.
     */
    public function sendEmails(array $emails)
    {
        foreach ($emails as $email) {
            $this->sendEmail($email);
        }
    }

    /**
     * @param string $email The email of the user.
     * @return bool True if the email was sent successfully,
     *  false otherwise.
     */
    private function sendEmail($email)
    {
        $message = "Welcome $email";
        echo "Sending message to $email: $message", PHP_EOL;
        return true;
    }
}