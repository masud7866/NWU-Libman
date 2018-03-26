<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/17/2018
 * Time: 10:58 PM
 */

require 'vendor/autoload.php';          //Loads up whole vendor packages which are installed in vendor folder through composer, Check getcomposer.org documentation for more info
require 'config.php';

$klein = new \Klein\Klein();            //Initialize the Klein PHP Router object


$request = \Klein\Request::createFromGlobals();     //Get Global Blank Request
$request->server()->set('REQUEST_URI', substr($_SERVER['REQUEST_URI'],  strlen("")));       //Set Request Path




/*     Routing Start         */
$klein->respond('GET','/',function ($request, $response) {
    $response->redirect("/login")->send();
});

$klein->respond('GET','/login',function ($request, $response) {
    include 'views/login.php';
});

$klein->respond('GET','/test',function ($request, $response) {
    include  'functions.php';
});

/*     Routing End         */


$klein->dispatch($request);     //Start the routing effect by dispatching request


?>