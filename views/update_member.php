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
    public $id = null;
    public $err_msg = null;
    public function title()
    {
        ?>
        Update Manager Info
        <?php
    }

    public function content()
    {
        $db = new \db();
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php

                    if ($this->err_msg !=null) {
                        echo $this->err_msg;
                        echo  "<br>";
                    }

                    ?>
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" id="id" name="id" class="form-control"
                                   required=""
                                   value="<?php echo $db->get_member_meta_info_by_id($this->id,'id'); ?>"
                                   placeholder="Enter ID..."/>

                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   required=""
                                   value="<?php echo $db->get_member_info_by_id($this->id,'name'); ?>"
                                   placeholder="Member Name..."/>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                   required=""
                                   value="<?php echo $db->get_member_info_by_id($this->id,'phone'); ?>"
                                   placeholder="Phone..."/>
                        </div>
                        <button type="submit" class="btn btn-info">Update Info</button>
                        <a type="button" href="../delete/<?php echo $this->id; ?>" class="btn btn-danger">Delete Member</a>
                    </form>


                </div>
            </div>
        </div>
        <?php
    }

}

?>