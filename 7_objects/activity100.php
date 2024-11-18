<?php
function doThing()
{
    // uh oh. Trouble!
    throw new Exception("A generic error", 666);
    print "this will never be executed";
}
$test = new ThingDoer();
$test->doThing();
