<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/17/2018
 * Time: 10:58 PM
 */
namespace app\views;
class login{
    public $err_msg = null;

    public function layout(){
?>

<!DOCTYPE html>
<html>
<head>
    <title>NWU-Libman</title>
    <link rel="stylesheet" href="../assets/css/main.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../assets/font-awesome/css/fontawesome-all.min.css"/>
</head>
<body>


<div class="container">
    <div class="panel panel-default loginform">
        <div class="panel-heading">
            <h1 align="center">Log In</h1>
        </div>
        <div class="panel-body">
            <div>
                <?php

                if ($this->err_msg !=null) {
                    echo $this->err_msg;
                }

                ?>
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
                    <div class="form-group">
                            <label class="radio-inline"><input type="radio" name="type" value="manager" checked>I am Manager</label>
                            <label class="radio-inline"><input type="radio" name="type" value="staff">I am Staff</label>
                    </div>
                    <button type="submit" name="login" class="btn bg-success">Log In</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    }
}
?>