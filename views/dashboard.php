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


                <div class="col-lg-2">
                    <button class="btn btn-primary sqbox" type="button">
                        Total Books <span class="badge">4000</span>
                    </button>
                </div>


                <div class="col-lg-2">
                    <button class="btn btn-primary sqbox" type="button">
                        Total Manager <span class="badge">2</span>
                    </button>
                </div>

                <div class="col-lg-2">
                    <button class="btn btn-primary sqbox" type="button">
                        Total Stuff <span class="badge">5</span>
                    </button>
                </div>

                <div class="col-lg-2">
                    <button class="btn btn-primary sqbox" type="button">
                        Total Manager <span class="badge">2</span>
                    </button>
                </div>

                <div class="col-lg-2">
                    <button class="btn btn-primary sqbox" type="button">
                        Stock Warning! <span class="badge">10</span>
                    </button>
                </div>

                <div class="col-lg-2">
                    <button class="btn btn-primary sqbox" type="button">
                        Active Borrowings Member <span class="badge">2500</span>
                    </button>
                </div>

            </div>
        </div>
        <?php
    }
}

?>