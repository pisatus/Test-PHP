<?php

declare(ticks = 1);

set_time_limit(1);

function foo() {
    for (;;) {}
}

class Invoker_TimeoutException extends RuntimeException {}

class Invoker
{
    public function invoke($callable, $timeout)
    {
        pcntl_signal(SIGALRM, function() { throw new Invoker_TimeoutException; }, TRUE);
        pcntl_alarm($timeout);
        call_user_func($callable);
    }
}

try {
    $invoker = new Invoker;
    $invoker->invoke('foo', 1);
} catch (Exception $e) {
    sleep(10);
    echo "Still running despite of the timelimit";
}
?>