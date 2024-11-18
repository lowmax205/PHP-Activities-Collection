<?php
function doThing()
{
    // uh oh. Trouble!
    throw new Exception("A generic error", 666);
    print "this will never be executed";
}
try {
    $test = new ThingDoer();
    $test->doThing();
} catch (Exception $e) {
    print $e->getMessage();
}
