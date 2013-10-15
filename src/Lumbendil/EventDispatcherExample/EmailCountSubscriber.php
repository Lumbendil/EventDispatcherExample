<?php


namespace Lumbendil\EventDispatcherExample;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EmailCountSubscriber implements EventSubscriberInterface
{
    private $successes;
    private $failures;

    public static function getSubscribedEvents()
    {
        return array(
            'welcome_mailer.mailer_start' => 'resetCounters',
            'welcome_mailer.mailer_end' => 'printCounters',
            'welcome_mailer.send_successful' => 'countSuccess',
            'welcome_mailer.send_failed' => 'countFailure',
        );
    }

    public function resetCounters()
    {
        $this->successes = $this->failures = 0;
    }

    public function countSuccess()
    {
        $this->successes++;
    }

    public function countFailuer()
    {
        $this->failures++;
    }

    public function printCounters()
    {
        echo "Mailing ended. Successes: {$this->successes}. Failures: {$this->failures}.", PHP_EOL;
    }
}