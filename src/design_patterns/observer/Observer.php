<?php

namespace ITsandbox;

use ITsandbox\SplObserver;
use ITsandbox\SplSubject;

class Observer implements SplObserver
{
    protected $name;
    protected $priority;

    public function __construct($name, $priority = 0)
    {
        $this->name     = $name;
        $this->priority = $priority;
    }

    public function update(SplSubject $publisher)
    {
        print_r($this->name.': '. $publisher->getEvent(). PHP_EOL);
    }

    public function getPriority()
    {
        return $this->priority;
    }
}