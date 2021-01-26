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

// define a lunch route
$f3->route('GET /lunch', function(){
    // echo "breakfast";
    $view = new Template();
    echo $view->render('/views/lunch.html');
});

// Define a lunch/sandwich route
$f3->route('GET /lunch/sandwich', function(){
    // echo "breakfast";
    $view = new Template();
    echo $view->render('/views/sandwich.html');
});

// Parameter in anonymous functions
$f3->route('GET /breakfast/@item', function($f3, $params){
    // echo "breakfast";
    var_dump($params);
    $menu = array('eggs', 'waffles', 'pancakes');
    $item = $params['item'];
    if(in_array($item, $menu)){
        switch($item){
            case 'eggs';
                $view = new Template();
                echo $view->render('/views/eggs.html');
            case 'pancakes';
                echo "Swedish or American?";
            case 'waffles';
                $f3->reroute("https://wafflehouse.com");
            default:
                $f3->error(404);
        }
    } else{
        echo "sorry we dont serve $item";
    }

    $view = new Template();
    echo $view->render('/views/breakfast.html');
});

// Run fat free
$f3->run();