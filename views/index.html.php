<?php

global $HOME,$POSTDIR,$POSTINDEX,$posts_per_page;
require_once("$HOME/libs/functions/helpers.php");
require_once("$HOME/libs/markdown/markdown.php");
$parser = new \Michelf\Markdown;


$allposts=postList();


// adjust $posts_per_page if below requested threshold
if (count($allposts) < $posts_per_page) {
  $posts_per_page=count($allposts);
}

for ($i=0;$i<$posts_per_page;$i++) {
  list($fname,$dirname,$pfile,$mfile,$url)=makePostVars($allposts[$i]);


  // read the meta data
  $meta=file($mfile,FILE_IGNORE_NEW_LINES);
  $unixtime=preg_grep('/^timestamp/',$meta);  // should only return 1 element
  $unixtime=preg_replace('/timestamp: /','',$unixtime[0]);
  $datestr=date("F j, Y [ h:ia ]",$unixtime);

  // Markdown-format the blog body  
  $fh=fopen($pfile,"r");
  $rawtext=fread($fh,filesize($pfile));
  $nicetext= $parser->defaultTransform($rawtext);

  // post output
  echo "$datestr<br>";
  echo "$nicetext";
  echo "<br><br>";

}


?>

