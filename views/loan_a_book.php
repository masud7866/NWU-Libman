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
                        <option data-tokens="ketchup mustard">Masud [103232]</option>
                        <option data-tokens="mustard">Burger, Shake and a Smile</option>
                        <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <br>
                    <select class="selectpicker" data-live-search="true">
                        <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                        <option data-tokens="mustard">Burger, Shake and a Smile</option>
                        <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                    </select>

                </div>

                <div class="form-group">
                    <label for="edition">Edition</label>
                    <br>
                    <select class="selectpicker" data-live-search="true">
                        <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                        <option data-tokens="mustard">Burger, Shake and a Smile</option>
                        <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="returndate">Book Return Date</label>
                    <br>
                    <input type="date" id="returndate" name="returndate" class="form-control"
                           placeholder="Book Edition..."/>
                </div>

                <button type="submit" name="add_book" class="btn bg-success">Register</button>
            </form>
        </div>
        <?php
    }

}


?>