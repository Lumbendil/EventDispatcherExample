<?php
use Lumbendil\EventDispatcherExample\WelcomeMailer;
use Symfony\Component\EventDispatcher\EventDispatcher;

require_once __DIR__ . "/../vendor/autoload.php";

$dispatcher = new EventDispatcher();
$mailer = new WelcomeMailer($dispatcher);

$emails = array(
    'bob@example.com',
    'alice@example.com',
);

$mailer->sendEmails($emails);