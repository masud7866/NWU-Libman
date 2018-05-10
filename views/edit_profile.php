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
        Edit Profile
        <?php
    }

    public function content()
    {
        $auth = new \authenticator();
        $db = new \db();
        $isAuth = $auth->isAuthenicated();
        ?>

        <div class="container">
            <div class="miniinfo">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" id="Name" name="name" class="form-control" required=""
                               placeholder="Enter Your Name..." value="<?php echo $db->get_user_info_by_id($isAuth[1],$isAuth[2],'name'); ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="Name">Avatar</label>
                        <input type="file" id="dp" name="dp" class="form-control"
                               placeholder="Enter Your Name..." value=""/>
                        <div class="img-thumbnail" align="right" >
                            <img width="150px" height="150px" src="/assets/images/<?php echo $db->get_user_info_by_id($isAuth[1],$isAuth[2],'avatar'); ?>" />

                        </div>
                    </div>
                    <div class="form-inline" align="center">
                        <button type="submit" name="update" class="btn bg-success">Update</button>
                    </div>

                </form>
            </div>
        </div>
        <?php
    }

}

?>