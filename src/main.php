<?php
use Lumbendil\EventDispatcherExample\WelcomeMailer;

require_once __DIR__ . "/../vendor/autoload.php";

$mailer = new WelcomeMailer();
$emails = array(
    'bob@example.com',
    'alice@example.com',
);
$mailer->sendEmails($emails);