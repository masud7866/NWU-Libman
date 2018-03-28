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
                    <h3 class="text-left">Loan Book Form</h3>
                </div>

            </div>

            <?php

            if ($this->err_msg != null) {
                echo $this->err_msg;
            }

            ?>
            <form action="" method="post" class="formCenter">
                <div class="form-group">
                    <label for="name">Name</label>
                    <br>
                    <select class="selectpicker" data-live-search="true">
                        <?php
                            foreach ($db->get_all_members() as $row)
                            {

                        ?>
                                <option data-tokens="<?php echo $row[1] ?>" name="member_id" value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <br>
                    <select class="selectpicker" data-live-search="true">
                        <?php
                        foreach ($db->get_all_books() as $row)
                        {
                            ?>
                            <option data-tokens="<?php echo $row[1] . " " . $row[2] . " edition"?>" name="book_id" value="<?php echo $row[0] ?>"><?php echo $row[1] . " " . $row[2] . " edition"?></option>
                        <?php } ?>

                    </select>

                </div>

                <div class="form-group">
                    <label for="edition">Tag</label>
                    <br>
                    <select class="selectpicker" data-live-search="true">
                        <?php
                        foreach ($db->get_all_tags() as $row)
                        {
                            ?>
                            <option data-tokens="<?php echo $row[0] ?>" name="book_tag" value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
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