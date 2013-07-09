<?php

//require_once('./authenticate.php');
require_once('../../config.php');


switch(filter_input(INPUT_POST,'func')) {
case "post_new":
  $title=filter_input(INPUT_POST,'title');
  $title=str_replace(' ','-',$title);  // first replace all spaces with hyphens
  $title=preg_replace('/[^A-Za-z0-9\-]/','',$title);  // now remove any character thats not A-Z, a-z, 0-9, or hyphen
  $title=preg_replace('/\-(\-)*/','-',$title); // remove duplicate hyphens
  $title=preg_replace('/\-$/','',$title);  // remove a hyphen at the end of the title
  echo $title;

  $body=filter_input(INPUT_POST,'body');
  $date=date('Y-m-d',time());
  echo "$date";

  $fname="${date}-$title";
  echo "<br><br>$fname";

  // write the file
  mkdir("$POSTDIR/$fname/");
  $fh=fopen("$POSTDIR/$fname/$fname.comp",'w');
  fwrite($fh,$body);
  fclose($fh);

break;

}




?>
