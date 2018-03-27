<?php
namespace app;
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/17/2018
 * Time: 10:58 PM
 */

ini_set("display_errors",1);
error_reporting(E_ALL);

use app\views\books;
use app\views\books_add;
use app\views\dashboard;
use app\views\login;


require 'vendor/autoload.php';          //Loads up whole vendor packages which are installed in vendor folder through composer, Check getcomposer.org documentation for more info
require 'config.php';
require 'templates/main_template.php';

$klein = new \Klein\Klein();            //Initialize the Klein PHP Router object


$request = \Klein\Request::createFromGlobals();     //Get Global Blank Request
$request->server()->set('REQUEST_URI', substr($_SERVER['REQUEST_URI'],  strlen("")));       //Set Request Path


/*     Routing Start         */

$klein->respond('GET','/',function ($request, $response) {
    $response->redirect("/login")->send();
});

$klein->respond('GET','/login',function ($request, $response) {
    require 'views/login.php';
    (new login)->layout();
});

$klein->respond('GET','/test',function ($request, $response) {
    include  'functions.php';
});


$klein->with('/manager', function () use ($klein) {

    $klein->respond('GET', '/', function ($request, $response) {
        $response->redirect("/manager/dashboard")->send();
    });

    $klein->respond('GET', '/dashboard', function ($request, $response) {
        require 'views/dashboard.php';
        (new dashboard())->layout();

    });

    $klein->with('/books', function () use ($klein) {
        $klein->respond('GET', '/', function ($request, $response) {
            require 'views/books.php';
            (new books())->layout();
        });
        $klein->respond('GET', '/add', function ($request, $response) {
            require 'views/books_add.php';
            (new books_add())->layout();
        });
    });

    $klein->with('/managers', function () use ($klein) {
        $klein->respond('GET', '/', function ($request, $response) {
            return 'view all books';
        });
        $klein->respond('GET', '/add', function ($request, $response) {
            return 'Add managers';
        });
    });

    $klein->with('/staffs', function () use ($klein) {

    });

    $klein->with('/members', function () use ($klein) {

    });

    $klein->with('/profiles', function () use ($klein) {

    });
});

/*     Routing End         */



$klein->dispatch($request);     //Start the routing effect by dispatching request


?>