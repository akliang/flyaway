<?php
//require(./authenticate.php');

global $HOME;
require_once("$HOME/libs/functions/helpers.php");

$allposts=postList();

foreach ($allposts as $apost) {
  list($fname,$dirname,$pfile,$mfile,$url)=makePostVars($apost);
  echo "<a href=$url>$dirname</a><br>";
}


?>
