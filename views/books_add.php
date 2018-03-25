<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/25/2018
 * Time: 12:11 AM
 */

include "../templates/main.template.php";


class books_add extends template
{
    public function title()
    {
        ?>
        Add Book
        <?php
    }

    public function content()
    {
        ?>
        <div class="container">
            ul

        </div>
        <?php
    }
}


$t = new books_add();

$t->layout();


?>