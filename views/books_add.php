<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/25/2018
 * Time: 12:11 AM
 */
namespace app\views;

use app\templates;

class books_add extends templates\main_template {

    public $err_msg = null;
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
        <div class="makeitcenter">
            <?php

            if ($this->err_msg !=null) {
                echo $this->err_msg;
            }

            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required=""
                           placeholder="Book Title..."/>
                </div>
                <div class="form-group">
                    <label for="edition">Edition</label>
                    <input type="text" id="edition" name="edition" class="form-control"
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
                           placeholder="Add in Stock..."/>
                </div>
                <button type="submit" name="add_book" class="btn bg-success">Add Book</button>
            </form>

        </div>
        </div>
        <?php
    }

}


?>