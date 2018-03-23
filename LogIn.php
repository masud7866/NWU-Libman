<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/17/2018
 * Time: 10:58 PM
 */
?>

<!DOCTYPE html>
<html>mm
<head>
    <title>NWU-Libman</title>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 align="center">Log In</h1>
        </div>
        <div class="panel-body">
            <div class="formCenter">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" required=""
                               placeholder="Enter Your Email..."/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required=""
                               placeholder="Enter Your Password..."/>
                    </div>
                    <button type="submit" name="login" class="btn bg-success">Log In</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>