<?php
if (get_magic_quotes_gpc()) {
    echo "Magic quotes are enabled";
} else {
    echo "Magic quotes are disabled";
}

// Remove slashes if magic quotes are enabled
echo stripslashes($_POST['question']);
?>
<form method='post'>
    Question: <input type='text' name='question'/>
    <input type='submit'>
</form>
