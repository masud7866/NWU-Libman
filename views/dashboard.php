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
                        <h3 class="dash-title">Total Books</h3>
                        <h1 class="dash-score"><?php
                        foreach ($this->db->get_books_count() as $row)
                        {
                            echo $row[0];
                        }
                            ?></h1>
                    </div>

                    <div class="col-lg-3 dashstyle">
                        <h3 class="dash-title">Total Members</h3>
                        <h1 class="dash-score"><?php
                            foreach ($this->db->get_members_count() as $row)
                            {
                                echo $row[0];
                            }
                            ?></h1>
                    </div>

                    <div class="col-lg-3 dashstyle">
                        <h3 class="dash-title">Total Staff</h3>
                        <h1 class="dash-score"><?php
                            foreach ($this->db->get_staffs_count() as $row)
                            {
                                echo $row[0];
                            }
                            ?></h1>
                    </div>

                    <div class="col-lg-3 dashstyle">
                        <h3 class="dash-title">Total Manager</h3>
                        <h1 class="dash-score"><?php
                            foreach ($this->db->get_managers_count() as $row)
                            {
                                echo $row[0];
                            }
                            ?></h1>
                    </div>

                    <div class="col-lg-3 dashstyle">
                        <h3 class="dash-title">Available copies</h3>
                        <h1 class="dash-score"><?php
                            foreach ($this->db->get_av_copies_count() as $row)
                            {
                                echo $row[0];
                            }
                            ?></h1>
                    </div>

                    <div class="col-lg-3 dashstyle">
                        <h3 class="dash-title">Copies in members' possession</h3>
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