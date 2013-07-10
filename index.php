<?php

require_once('./config.php');
require_once("$HOME/libs/dispatch/dispatch.php");
config('source',"$HOME/libs/dispatch/config.ini");


get('/',function() {
  render('index',array('sub'=>'index'));
});

get('/post',function () {
  render('post',array('sub'=>'post','postid'=>$postid));
});

get('/post/:postid',function ($postid) {
  render('post',array('sub'=>'post','postid'=>$postid));
});

get('/browse',function () {
  render('browse',array('sub'=>'browse'));
});

get('/edit',function() {
  render('edit',array('sub'=>'edit'));
});


get('/:year/:month/:day/:name',function($year,$month,$day,$name) {
  $pfile="posts/$year-$month-$day-$name/$year-$month-$day-$name.comp";
  render('read',array('sub'=>'read','pfile'=>$pfile));
});

dispatch();

?>


