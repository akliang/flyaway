<?php

global $HOME;
require_once("$HOME/libs/functions/helpers.php");

if (isset($postid)) {
  $post_func="edit_post";

  list($fname,$dirname,$pfile,$mfile,$url)=makePostVars("$postid.comp");
  list($year,$month,$day,$title)=explode('-',$dirname,4);
  $title=preg_replace('/-/',' ',$title);
  $tlock="readonly";
  $fh=fopen($pfile,'r');
  $body=fread($fh,filesize($pfile));
  fclose($fh);
} else {
  $post_func="post_new";
}

echo <<<HTML

<form name=post action='/libs/functions/backend.php' method=post>
<input type=hidden name=func value=$post_func>
<input type=hidden name=fname value="$fname">
<input type=text name=title value="$title" $tlock><br>
<textarea name=body>$body</textarea><br>
<input type=submit value=Post><br>
</form>


HTML;

?>

