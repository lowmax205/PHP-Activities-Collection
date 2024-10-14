<?php
 if ( ! empty( $_POST['guess'] ) ) {
     print "last guess: ".$_POST['guess'];
 }
 ?>
 <form method="post" action="<?php print $_SERVER['PHP_SELF']?>">
 <p>
 Type your guess here: <input type="text" name="guess" />
 </p>
 </form>
