<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/26/2018
 * Time: 12:53 PM
 */

namespace app\views;

use app\templates;

class staff_add extends templates\main_template {
    public function title()
    {
        ?>
        Add New Stuff
        <?php
    }

    public function content()
    {
        ?>
        <div class="container">
            <div class="makeitcenter">
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
                    <button type="submit" name="add_staff" class="btn bg-success">Add Staff</button>
                </form>

            </div>
        </div>
        <?php
    }

}

?>