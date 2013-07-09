
<?php

echo <<<HTML

<form name=post action='$HOME/libs/functions/backend.php' method=post>
<input type=hidden name=func value=post_new>
<input type=text name=title><br>
<textarea name=body></textarea><br>
<input type=submit value=Post><br>
</form>


HTML;

?>

