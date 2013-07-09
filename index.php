<?php

require_once('./config.php');
require_once("$HOME/libs/dispatch/dispatch.php");
config('source',"$HOME/libs/dispatch/config.ini");


get('/',function() {
  render('index',array('sub'=>'index'));
});

get('/post',function () {
  render('post',array('sub'=>'post'));
});

get('/browse',function () {
  render('browse',array('sub'=>'browse'));
});

get('/read',function() {
  render('read',array('sub'=>'read'));
});

dispatch();

?>


