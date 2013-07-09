<?php

global $HOME;

$postid=filter_input(INPUT_GET,'id');
echo "postid: $postid";
if (empty($postid)) {
  echo "empty!";
}
elseif (file_exists("$POSTDIR/$postid")) {
  echo "hi";
}




// get the posts
echo <<<HTML



HTML;



?>
