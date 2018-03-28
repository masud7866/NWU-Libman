<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/26/2018
 * Time: 12:42 PM
 */

namespace app\views;
use app\templates;

class change_password extends templates\main_template {
    public $err_msg = null;
    public function title()
    {
        ?>
        Change Password
        <?php
    }

    public function content()
    {
        ?>
        <div class="container">
            <div class="makeitcenter">
                <?php
                if ($this->err_msg !=null) {
                    echo $this->err_msg;
                    echo "<br>";
                }

                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="oldpassword">Old Password</label>
                        <input type="password" id="oldpassword" name="oldpassword" class="form-control" required=""
                               placeholder="Enter Current Password..."/>
                    </div>
                    <div class="form-group">
                        <label for="newpassword">New Password</label>
                        <input type="password" id="newpassword" name="newpassword" class="form-control" required=""
                               placeholder="Set New Password..."/>
                    </div>
                    <div class="form-group">
                        <label for="varifypassword">Re-Enter New Password</label>
                        <input type="password" id="varifypassword" name="varifypassword" class="form-control"
                               required=""
                               placeholder="Re-Enter New Password..."/>
                    </div>
                    <button type="submit" name="changepassword" class="btn bg-success">Update Password</button>
                </form>
            </div>
        </div>
        <?php
    }

}

?>
