<?php

namespace ITsandbox;

use ITsandbox\SplSubject;
use ITsandbox\SplObserver;

class Publisher implements SplSubject
{
    protected $linkedList   = array();
    protected $observers    = array();
    protected $name;
    protected $event;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function attach(SplObserver $observer)
    {
        $observer_key                       = spl_object_hash($observer);
        $this->observers  [$observer_key]   = $observer;
        $this->linkedList[$observer_key]    = $observer->getPriority();
        arsort($this->linkedList);
    }

    public function detatch(SplObserver $observer)
    {
        $observer_key = spl_object_hash($observer);
        unset($this->observers [$observer_key]);
        unset($this->linkedList[$observer_key]);
    }

    public function notify()
    {
        foreach($this->linkedList as $key => $value)
            $this->observers[$key]->update($this);
    }

    public function setEvent($event)
    {
        $this->event  = $event;
        $this->notify();
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function getSubscribers()
    {
        return $this->getSubscribers();
    }
}