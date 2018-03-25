<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 25-Mar-18
 * Time: 9:02 PM
 */

class template
{
    function layout()
    {
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>NWU-Libman</title>
            <link rel="stylesheet" href="../assets/css/main.css"/>
            <link rel="stylesheet" href="../assets/css/bootstrap.css"/>
            <link rel="stylesheet" href="../assets/font-awesome/css/fontawesome-all.min.css"/>
        </head>
        <body>
        <div class="header">
            <div class="logo">
                <i class="fa fa-books"></i>
                <span>Manager Panel</span>
            </div>
            <a href="#" class="nav-trigger"><span></span></a>
        </div>
        <div class="side-nav">
            <div class="logo">
                <span><i class="fas fa-book"></i></span>
                <span>NWU-Libman</span>
            </div>
            <nav>
                <ul>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><i class="fas fa-book"></i></i></span>
                            <span>Books</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">

                            <span><i class="fas fa-user-circle"></i></span>
                            <span>Managers</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><i class="fas fa-users"></i></span>
                            <span>Staffs</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><i class="fas fa-users"></i></span>
                            <span>Members</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><i class="fas fa-user"></i></span>
                            <span>Profile</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="main-content">
            <div class="title">
                <?php
                   echo $this->title();
                ?>
            </div>

            <div class="main">
                <div class="widget">
                    <div class="title">
                        <?php
                        echo $this->title();
                        ?>
                    </div>
                    <div class="chart"></div>
                </div>
            </div>
        </div>

        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.js"></script>
        </body>
        </html>

        <?php
    }
}
?>