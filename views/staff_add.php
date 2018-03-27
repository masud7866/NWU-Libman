<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/26/2018
 * Time: 12:53 PM
 */

include "../templates/main_template.php";

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
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" required=""
                               placeholder="Book Title..."/>
                    </div>
                    <div class="form-group">
                        <label for="edition">Edition</label>
                        <input type="text" id="edition" name="edition" class="form-control" required=""
                               placeholder="Book Edition..."/>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" required=""
                               placeholder="Subject..."/>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" class="form-control" required=""
                               placeholder="Author Name..."/>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control" required=""
                               placeholder="Stocks..."/>
                    </div>
                    <button type="submit" name="add_book" class="btn bg-success">Add Book</button>
                </form>

            </div>
        </div>
        <?php
    }

}

?>