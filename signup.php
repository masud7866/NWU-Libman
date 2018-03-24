<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/17/2018
 * Time: 10:58 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>NWU-Libman</title>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
</head>
<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 align="center">Sign Up</h1>
        </div>
        <div class="panel-body">
            <div class="formCener">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required=""
                               placeholder="Enter Your Name..."/>
                    </div>
                    <div class="form-group">
                        <label for="userName">User Name</label>
                        <input type="text" id="userName" name="userName" class="form-control" required=""
                               placeholder="Chose a username..."/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" required=""
                               placeholder="Enter Your Email..."/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required=""
                               placeholder="Set a password..."/>
                    </div>
                    <button type="submit" name="signup" class="btn bg-success">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.min.js"></script>
</body>
</html>