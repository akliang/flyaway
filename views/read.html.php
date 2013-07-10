<?php

global $HOME;
require_once("$HOME/libs/markdown/markdown.php");
$parser = new \Michelf\Markdown;

$pfile2="$HOME/$pfile";
$fh=fopen($pfile2,"r");
$rawtext=fread($fh,filesize($pfile2));
$nicetext= $parser->defaultTransform($rawtext);


echo <<<HTML

$nicetext

HTML;



?>
