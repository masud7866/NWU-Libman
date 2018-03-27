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
use app\views\member_add;


require 'vendor/autoload.php';          //Loads up whole vendor packages which are installed in vendor folder through composer, Check getcomposer.org documentation for more info
require 'config.php';
require 'templates/main_template.php';
require 'functions.php';

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
        $klein->respond('POST', '/add', function ($request, $response) {
            require 'views/books_add.php';
            $title = $request->param('title');
            $edition = $request->param('edition');
            $subject = $request->param('subject');
            $author = $request->param('author');
            $stock = $request->param('stock');

            if (strpos($author,",")==false){
                $author = array($author);
            }
            else
            {
                $author=explode($author,",");
            }
            $db = new \db();
            $res = $db->insert_books($title,$edition,$subject,$author,$stock);
            $add_book = (new books_add());
            if ($res)
            {
                $add_book->err_msg = "<div class='bg-success'>The book is successfully added to the stock</div>";
            }
            else
            {
                $add_book->err_msg = "<div class='bg-danger'>The book could not be added</div>";
            }

            $add_book->layout();
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
        $klein->respond('GET', '/', function ($request, $response) {
            return 'View all members page will be shown here';
        });
        $klein->respond('GET', '/add', function ($request, $response) {
            require 'views/member_add.php';
            (new member_add())->layout();
        });
        $klein->respond('POST', '/add', function ($request, $response) {
            require 'views/member_add.php';
            $name = $request->param('name');
            $email = $request->param('email');
            $phone = $request->param('phone');
            $type = $request->param('type');
            $id = $request->param('id');
            $join_date = $request->param('join-date');
            $db = new \db();
            $res = $db->add_members($name,$email,$phone,$type,$id,$join_date);
            $add_member = (new member_add());
            if ($res)
            {
                $add_member->err_msg = "<div class='bg-success'>The member is successfully added</div>";
            }
            else
            {
                $add_member->err_msg = "<div class='bg-danger'>The member could not be added</div>";
            }

            $add_member->layout();
        });
    });

    $klein->with('/profiles', function () use ($klein) {

    });
});

/*     Routing End         */



$klein->dispatch($request);     //Start the routing effect by dispatching request


?>