<?php

global $HOME;

foreach (glob("posts/*/*.comp") as $postid) {
  echo "<a href=read.php?postid=$postid>$postid</a><br>";
}

// get the posts
echo <<<HTML



HTML;



?>
