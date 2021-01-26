<?php
// turn on error reporting
ini_set('display_error', 1);
error_reporting(E_ALL);

// require the autoload file
require_once('vendor/autoload.php');

// create an instance of the base class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /' , function(){
    // fat free - taking the view page and rendering it in the browser
    $view = new Template();
    echo $view->render('/views/home.html');
});

// define a breakfast route
$f3->route('GET /breakfast', function(){
    // echo "breakfast";
    $view = new Template();
    echo $view->render('/views/breakfast.html');
});

// define a breakfast route
$f3->route('GET /lunch', function(){
    // echo "breakfast";
    $view = new Template();
    echo $view->render('/views/lunch.html');
});

// Run fat free
$f3->run();