<?php

require_once('./libs/dispatch/src/dispatch.php');
config('source','libs/dispatch/config.ini');


get('/',function() {
  render('index');
});

get('/test',function () {
  render('test');
});

dispatch();

?>


