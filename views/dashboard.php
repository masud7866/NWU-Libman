<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/25/2018
 * Time: 12:11 AM
 */

include "../templates/main.template.php";


class dashboard extends template{
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
            test

        </div>
<?php
    }
}


$t = new dashboard();

$t->layout();


?>