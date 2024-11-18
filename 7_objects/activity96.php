<?php
class TimeThing
{
    function __get($arg)
    {
        if ($arg == "time") {
            return getdate();
        }
    }
    function __set($arg, $val)
    {
        if ($arg == "time") {
            trigger_error("cannot set property $arg");
            return false;
        }
    }
}
$cal = new TimeThing();
print $cal->time['mday'] . "/";
print $cal->time['mon'] . "/";
print $cal->time['year'];
$cal->time = 555; // illegal call