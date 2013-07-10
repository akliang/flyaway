<?php

//require_once('./authenticate.php');
require_once('../../config.php');
require_once("$HOME/libs/functions/helpers.php");


switch(filter_input(INPUT_POST,'func')) {
case "post_new":
  $title=filter_input(INPUT_POST,'title');
  $title=str_replace(' ','-',$title);  // first replace all spaces with hyphens
  $title=preg_replace('/[^A-Za-z0-9\-]/','',$title);  // now remove any character thats not A-Z, a-z, 0-9, or hyphen
  $title=preg_replace('/\-(\-)*/','-',$title); // remove duplicate hyphens
  $title=preg_replace('/\-$/','',$title);  // remove a hyphen at the end of the title

  $body=filter_input(INPUT_POST,'body');
  $date=date('Y-m-d',time());

  // write the file
  $fname="${date}-$title";
  mkdir("$POSTDIR/$fname/");
  $fh=fopen("$POSTDIR/$fname/$fname.comp",'w');
  fwrite($fh,$body);
  fclose($fh);

  // write the meta file
  $fh=fopen("$POSTDIR/$fname/$fname.meta",'w');
  fwrite($fh,"timestamp: ".time()."\n");
  fclose($fh);

  // add this post to post_index
  $fh=fopen("$POSTDIR/post_index.txt",'a');
  fwrite($fh,"$fname.comp\n");
  fclose($fh);

 
  header("Location: /edit");

break;

case "edit_post":
  $fname=filter_input(INPUT_POST,'fname');
  list($fname,$dirname,$pfile,$mfile,$url)=makePostVars($fname);
  $body=filter_input(INPUT_POST,'body');


  // backup the old comp
  $allvers=glob("$POSTDIR/$dirname/*.comp*");
  rsort($allvers);  // this depends on the zero-padding to function properly!
  $vernum=preg_replace('/.*comp\./','',$allvers[0]);
  if (empty($vernum)) { $vernum=1; } else { $vernum=$vernum+1; }
  $vernum=sprintf('%04d',$vernum);
  rename($pfile,"$pfile.$vernum");

  // write the new version to the main .comp
  $fh=fopen($pfile,'w');
  fwrite($fh,$body);
  fclose($fh);

  // update the last-edit timestamp in meta
  

  header("Location: /edit");

break;

}





?>
