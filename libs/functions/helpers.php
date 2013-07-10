<?php

if (file_exists('./config.php')) {
  require('./config.php');
} elseif (file_exists('../config.php')) {
  require('../config.php');
} elseif (file_exists('../../config.php')) {
  require('../../config.php');
} else {
  trigger_error('Config file not found -- what directory level are you in?');
  exit;
}


function postList() {
  global $POSTINDEX;
  // read in post_index.html
  $allposts=file($POSTINDEX,FILE_IGNORE_NEW_LINES);
  $allposts=array_reverse($allposts); // put the newest post first
  return $allposts;
}

function makePostVars($fname) {
  global $POSTDIR;
  $dirname=preg_replace('/\.comp/','',$fname);     // this is the post title without .comp
  $pfile="$POSTDIR/$dirname/$fname";               // this is the full path to the .comp file
  $mfile=preg_replace('/\.comp/','.meta',$pfile);  // this is the full path to the .meta file
  list($year,$month,$day,$title)=explode('-',$dirname,4);
  $url="/$year/$month/$day/$title";                // this is the url (without .comp)
  return array($fname,$dirname,$pfile,$mfile,$url);
}


?>
