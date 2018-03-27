<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/26/2018
 * Time: 12:53 PM
 */
namespace app\views;

use app\templates;

class member_add extends templates\main_template {
    public $err_msg = null;
    public function title()
    {
        ?>
        Add New Member
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
                        <label for="id">ID</label>
                        <input type="number" id="id" name="id" class="form-control" required=""
                               placeholder="Enter ID Number..."/>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required=""
                               placeholder="Enter Name..."/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" required=""
                               placeholder="Enter Email Address..."/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" id="phone" name="phone" class="form-control" required=""
                               placeholder="Enter Phone Number..."/>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <br>
                        <label class="radio-inline">
                            <input type="radio" id="type" name="type" value="student" required="">Student
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="type" name="type" value="teacher" required="">Teacher
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="join-date">Join Date</label>
                        <input type="date" id="join-date" name="join-date" class="form-control" required=""
                               placeholder="Enter Phone Number..."/>
                    </div>
                    <button type="submit" name="add_member" class="btn bg-success">Add Member</button>
                </form>
            </div>
        </div>
        <?php
    }

}


?>