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


class template
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

            <title>NWU-Libman</title>

            <!-- Bootstrap CSS CDN -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <!-- Our Custom CSS -->
            <link rel="stylesheet" href="../assets/css/main.css">
        </head>
        <body>


        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>NWU-Libman</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Manager Panel</p>
                    <li class="active">
                        <a href="#bookSubmenu" data-toggle="collapse" aria-expanded="false">Books</a>
                        <ul class="collapse list-unstyled" id="bookSubmenu">
                            <li><a href="#">Add Books</a></li>
                            <li><a href="#">View Books</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#managerSubmenu" data-toggle="collapse" aria-expanded="false">Managers</a>
                        <ul class="collapse list-unstyled" id="managerSubmenu">
                            <li><a href="#">Add Managers</a></li>
                            <li><a href="#">Views</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Stuffs</a>
                    </li>
                    <li>
                        <a href="#">Members</a>
                    </li>
                    <li class="active">
                        <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false">Profile</a>
                        <ul class="collapse list-unstyled" id="profileSubmenu">
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="#">Change Password</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">

                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>


        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
        </body>
        </html>


        <?php
    }
}

?>