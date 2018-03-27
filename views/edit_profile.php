<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/27/2018
 * Time: 7:14 PM
 */
namespace app\views;

use app\templates;

class edit_profile extends templates\main_template
{

    public function title()
    {
        ?>
        Edit_Profile
        <?php
    }

    public function content()
    {
        ?>
        <div class="container">


            <div class="miniinfo">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" id="Name" name="Name" class="form-control" required=""
                               placeholder="Enter Your Name..."/>
                    </div>
                    <div class="form-group">
                        <label for="Phone Number">Phone Number</label>
                        <input type="text" id="Phone Number" name="Phone Number" class="form-control" required=""
                               placeholder="Phone Number..."/>
                    </div>

                </form>

                <div class="form-inline" align="center">
                    <button type="button" class="btn btn-success">Submit</button>

                </div>

            </div>



        </div>
        <?php
    }

}

?>