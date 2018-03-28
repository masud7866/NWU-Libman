<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/28/2018
 * Time: 7:36 PM
 */
namespace app\views;

use app\templates;

class update_member extends templates\main_template
{

    public function title()
    {
        ?>
        Update Manager Info
        <?php
    }

    public function content()
    {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" id="id" name="id" class="form-control"
                                   required=""
                                   placeholder="Enter ID..."/>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   required=""
                                   placeholder="Member Name..."/>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                   required=""
                                   placeholder="Phone..."/>
                        </div>
                    </form>
                    <button type="button" class="btn btn-info">Update Info</button>
                    <button type="button" class="btn btn-danger">Delete Member</button>
                </div>
            </div>
        </div>
        <?php
    }

}

?>