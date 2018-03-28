<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 25-Mar-18
 * Time: 9:02 PM
 */

/*
 *  -views
 *   --manager
 *   --staff
 *
 *
 */

namespace app\templates;

class main_template
{
    function layout()
    {
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <title>
                <?php
                if (method_exists($this, 'title')) {
                    echo $this->title() . ' - ' . APPNAME;
                }
                ?>
            </title>

            <link rel="stylesheet" href="<?php APP_URL ?>/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php APP_URL ?>/assets/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="<?php APP_URL ?>/assets/css/select.dataTables.min.css">
            <link rel="stylesheet" href="<?php APP_URL ?>/assets/css/bootstrap-select.min.css">
            <link rel="stylesheet" href="<?php APP_URL ?>/assets/css/main.css">

        </head>
        <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <h2>NWU-Libman</h2>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btnpositionfix" type="button"
                                data-toggle="dropdown">Hello, <?php
                            $auth = new \authenticator();
                            $db = new \db();
                            $isAuth = $auth->isAuthenicated();
                            if ($isAuth) {
                                echo $db->get_user_info_by_id($isAuth[1], $isAuth[2], 'name');
                            }
                            ?>
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo APP_URL . "/" . $isAuth[2] . "/profiles/edit" ?>">Profile</a></li>
                            <li><a href="<?php echo APP_URL . "/" . $isAuth[2] . "/profiles/cpw" ?>">Change Password</a>
                            </li>
                            <li><a href="<?php echo APP_URL . "/logout" ?>">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3 class="text-uppercase"><?php
                        if ($isAuth) {
                            echo $isAuth[2];
                        }
                        ?> Panel</h3>
                </div>

                <?php
                if (method_exists($this, 'menu')) {
                    echo $this->menu();
                } else {
                    ?>
                    <ul class="list-unstyled components">

                    <?php if ($isAuth[2] == "staff") { ?>
                        <li>
                            <a href="<?php echo APP_URL . "/staff/dashboard" ?>">Dashboard</a>
                        </li>
                        <li>
                            <a href="#staffSubmenu" data-toggle="collapse" aria-expanded="false">Borrowings</a>
                            <ul class="collapse list-unstyled" id="staffSubmenu">
                                <li><a href="<?php echo APP_URL . "/staff/borrowings/loan" ?>">Loan A Book</a></li>
                                <li><a href="<?php echo APP_URL . "/staff/borrowings/" ?>">History</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#memberSubmenu" data-toggle="collapse" aria-expanded="false">Members</a>
                            <ul class="collapse list-unstyled" id="memberSubmenu">
                                <li><a href="<?php echo APP_URL . "/staff/members/add" ?>">Add Member</a></li>
                                <li><a href="<?php echo APP_URL . "/staff/members/" ?>">View Members</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="<?php echo APP_URL . "/manager/dashboard" ?>">Dashboard</a>
                        </li>
                        <li>
                            <a href="#bookSubmenu" data-toggle="collapse" aria-expanded="false">Books</a>
                            <ul class="collapse list-unstyled" id="bookSubmenu">
                                <li><a href="<?php echo APP_URL . "/manager/books/add" ?>">Add Book</a></li>
                                <li><a href="<?php echo APP_URL . "/manager/books/" ?>">View Books</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#managerSubmenu" data-toggle="collapse" aria-expanded="false">Managers</a>
                            <ul class="collapse list-unstyled" id="managerSubmenu">
                                <li><a href="<?php echo APP_URL . "/manager/managers/add" ?>">Add Manager</a></li>
                                <li><a href="<?php echo APP_URL . "/manager/managers/" ?>">View Managers</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#staffSubmenu" data-toggle="collapse" aria-expanded="false">Staffs</a>
                            <ul class="collapse list-unstyled" id="staffSubmenu">
                                <li><a href="<?php echo APP_URL . "/manager/staffs/add" ?>">Add Staff</a></li>
                                <li><a href="<?php echo APP_URL . "/manager/staffs/" ?>">View Staffs</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#memberSubmenu" data-toggle="collapse" aria-expanded="false">Members</a>
                            <ul class="collapse list-unstyled" id="memberSubmenu">
                                <li><a href="<?php echo APP_URL . "/manager/members/add" ?>">Add Member</a></li>
                                <li><a href="<?php echo APP_URL . "/manager/members/" ?>">View Members</a></li>
                            </ul>
                        </li>
                        </ul>
                        <?php
                    }
                }
                ?>
            </nav>


            <!-- Page Content Holder -->
            <div id="content">
                <?php
                if (method_exists($this, 'content')) {
                    echo $this->content();
                }
                ?>

            </div>
        </div>

        <script src="<?php APP_URL ?>/assets/js/jquery-1.12.0.min.js"></script>
        <script src="<?php APP_URL ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php APP_URL ?>/assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php APP_URL ?>/assets/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php APP_URL ?>/assets/js/dataTables.select.min.js"></script>
        <script src="<?php APP_URL ?>/assets/js/bootstrap-select.min.js"></script>
        <script src="<?php APP_URL ?>/assets/js/main.js"></script>

        </body>
        </html>
        <?php
    }
}

?>