<?php
/**
 * Created by PhpStorm.
 * User: Kimt
 * Date: 31/07/2018
 * Time: 15:15
 */

require __DIR__ . '/vendor/autoload.php';

use Mpociot\BotMan\BotManFactory;
use Mpociot\BotMan\BotMan;

$config = [
    'hipchat_urls' => [
        'YOUR-INTEGRATION-URL-1',
        'YOUR-INTEGRATION-URL-2',
    ],
    'facebook_token' => 'EAADPCsZAcPH4BAD2DQKRbQs6CX1r3dZB83DuTZA8IKvUcRaDy7R88ZBiOEzp2ZBupZAKQabQZAvQz1qrOXtwNte6FqmQ2ZAptsQtTY3ZBw4CJRdyFkZA7umE0qSk5zNu8lENTOu9bqoHk53B8lJ28XoDSbCjMq6X3oC9jXbf5IfcmDH3xhRZBkOdA1D',
    'facebook_app_secret' => '46aed456a992d6fe75b685111c14e3a0',
];

// create an instance
$botman = BotManFactory::create($config);
// In your BotMan controller
$botman->verifyServices('0123456789juin1992');
// give the bot something to listen for.
$botman->hears('bonjour', function (BotMan $bot) {
    $user = $bot->getUser();
    $bot->reply('Bonjour '.$user->getFirstName().' '.$user->getLastName());
    $bot->reply('Que puis je faire pour vous?.');
});

// start listening
$botman->listen();