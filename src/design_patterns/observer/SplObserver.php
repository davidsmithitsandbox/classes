<?php

namespace ITsandbox;

interface SplObserver
{
    public function update(SplSubject $subject);
}