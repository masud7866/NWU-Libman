<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/25/2018
 * Time: 12:11 AM
 */

namespace app\views;

use app\templates;

class dashboard extends templates\main_template
{
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

            <div class="row">

                <div class="col-lg-12">
                    <div class="col-lg-3 dashstyle">
                        <h3 class="dash-title"><a href="books/">Total Books</a></h3>
                        <h1 class="dash-score"><?php
                        foreach ($this->db->get_books_count() as $row)
                        {
                            echo $row[0];
                        }
                            ?></h1>
                    </div>

                    <div class="col-lg-3 dashstyle">
                        <h3 class="dash-title"><a href="members/">Total Members</a> </h3>
                        <h1 class="dash-score"><?php
                            foreach ($this->db->get_members_count() as $row)
                            {
                                echo $row[0];
                            }
                            ?></h1>
                    </div>

                    <div class="col-lg-3 dashstyle">
                        <h3 class="dash-title"><a href="staffs/">Total Staff</a> </h3>
                        <h1 class="dash-score"><?php
                            foreach ($this->db->get_staffs_count() as $row)
                            {
                                echo $row[0];
                            }
                            ?></h1>
                    </div>

                    <div class="col-lg-3 dashstyle">
                        <h3 class="dash-title"><a href="managers/">Total Manager</a> </h3>
                        <h1 class="dash-score"><?php
                            foreach ($this->db->get_managers_count() as $row)
                            {
                                echo $row[0];
                            }
                            ?></h1>
                    </div>

                    <div class="col-lg-3 dashstyle">
                        <h3 class="dash-title"><a href="books/">Available copies</a> </h3>
                        <h1 class="dash-score"><?php
                            foreach ($this->db->get_av_copies_count() as $row)
                            {
                                echo $row[0];
                            }
                            ?></h1>
                    </div>

                    <div class="col-lg-3 dashstyle">
                        <h3 class="dash-title"><a href="borrowings/">Copies in members' possession</a> </h3>
                        <h1 class="dash-score"><?php
                            foreach ($this->db->count_borrowed_book() as $row)
                            {
                                echo $row[0];
                            }
                            ?></h1>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }
}

?>