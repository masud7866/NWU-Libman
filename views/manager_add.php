<?php
/**
 * Created by PhpStorm.
 * User: masud
 * Date: 27-Mar-18
 * Time: 11:44 PM
 */

namespace app\views;
use app\templates;

class manager_add extends templates\main_template {
    public $err_msg = null;
    public function title()
    {
        ?>
        Add New Manager
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
                }

                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required=""
                               placeholder="Enter Name..."/>
                    </div>
                    <div class="form-group">
                        <label for="edition">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required=""
                               placeholder="Enter Email Address..."/>
                    </div>
                    <div class="form-group">
                        <label for="subject">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required=""
                               placeholder="Enter Password..."/>
                    </div>
                    <button type="submit" name="add_staff" class="btn bg-success">Add Manager</button>
                </form>

            </div>
        </div>
        <?php
    }

}

?>