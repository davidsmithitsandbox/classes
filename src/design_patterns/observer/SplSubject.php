<?php

namespace ITsandbox;

interface SplSubject
{
    public function attach (SplObserver $observer);
    public function detatch(SplObserver $observer);
    public function notify();
}
