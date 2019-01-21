<?php
require __DIR__ . '../../../../vendor/autoload.php';

use ITsandbox\Publisher;
use ITsandbox\Observer;

$Publisher  = new Publisher('NotificationPublisher');

$observer1  = new Observer('Observer1');
$observer2  = new Observer('Observer2');

// Attach observers
$Publisher->attach($observer1);
$Publisher->attach($observer2);
// Set event that will be broadcasted
$Publisher->setEvent("Message");