<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/25/2018
 * Time: 12:11 AM
 */

namespace app\views;

use app\templates;

class dashboard extends templates\main_template {
    public function title()
    {
        ?>
            Dashboard
        <?php
    }
    public function content()
    {
        ?>
        <div class="container">
            Content of Dashboard

        </div>
<?php
    }
}

?>