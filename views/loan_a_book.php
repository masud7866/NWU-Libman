<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/28/2018
 * Time: 8:27 PM
 */

namespace app\views;

use app\templates;

class loan_a_book extends templates\main_template
{

    public $err_msg = null;

    public function title()
    {
        ?>
        Loan A Book
        <?php
    }

    public function content()
    {
        $db = new \db();


        ?>

        <div class="container">
            <div class="container">
                <div class="row">
                    <h3 class="text-left panel-heading">Loan Book</h3>
                </div>

            </div>

            <?php

            if ($this->err_msg != null) {
                echo $this->err_msg;
            }

            ?>
            <form action="" method="post" class="formCenter">
                <div class="form-group">
                    <label for="member_id">Member Name</label>
                    <br>
                    <select class="selectpicker" data-live-search="true" name="member_id" id="member_id">
                        <?php
                            foreach ($db->get_all_members() as $row)
                            {
                        ?>
                                <option data-tokens="<?php echo $row[1] ?>"  value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="book_id">Book Title</label>
                    <br>
                    <select class="selectpicker" data-live-search="true" name="book_id" id="book_id">
                        <?php
                        foreach ($db->get_all_books() as $row)
                        {
                            ?>
                            <option data-tokens="<?php echo $row[1] . " " . $row[2] . " edition"?>" value="<?php echo $row[0] ?>"><?php echo $row[1] . " " . $row[2] . " edition"?></option>
                        <?php } ?>

                    </select>

                </div>

                <div class="form-group">
                    <label for="tag">Tag</label>
                    <br>
                    <select class="selectpicker" data-live-search="true" name="book_tag" id="book_tag">
                        <?php
                        foreach ($db->get_all_tags() as $row)
                        {
                            $book = $db->get_book_by_id($row[1]);
                            ?>
                            <option data-tokens="<?php echo $row[0] ?>" name="book_tag" value="<?php echo $row[0] ?>"><?php echo $row[0] . " [" . $book[1] . " " . $book[2] . " edition ]"?></option>
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="returndate">Book Return Date</label>
                    <br>
                    <input type="date" id="returndate" name="returndate" class="form-control"
                           placeholder="Book Edition..."/>
                </div>

                <button type="submit" name="add_book" class="btn bg-success">Loan</button>
            </form>
        </div>


        <?php
    }

}


?>