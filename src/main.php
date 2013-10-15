<?php
use Lumbendil\EventDispatcherExample\AliceEmailListener;
use Lumbendil\EventDispatcherExample\EmailCountSubscriber;
use Lumbendil\EventDispatcherExample\WelcomeMailer;
use Symfony\Component\EventDispatcher\EventDispatcher;

require_once __DIR__ . "/../vendor/autoload.php";

$dispatcher = new EventDispatcher();

$dispatcher->addListener('welcome_mailer.mail_prepared', array(new AliceEmailListener(), 'changeAliceMessage'));
$dispatcher->addSubscriber(new EmailCountSubscriber());

$mailer = new WelcomeMailer($dispatcher);

$emails = array(
    'bob@example.com',
    'alice@example.com',
);

$mailer->sendEmails($emails);