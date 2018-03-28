<?php
/**
 * Created by PhpStorm.
 * User: masud
 * Date: 28-Mar-18
 * Time: 10:10 AM
 */

namespace app\views;

use app\templates;

class staffs extends templates\main_template
{
    public $db = null;

    public function title()
    {
        ?>
        Staffs
        <?php
    }

    public function content()
    {
        if ($this->db->get_all_staffs() !== null) {
            ?>
            <div class="container">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Date of Staff Added</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($this->db->get_all_staffs() as $row)
                    {

                        ?>
                        <tr>
                            <td><?php echo $row[1] ?></td>
                            <td><?php echo $row[2] ?></td>
                            <td><?php
                                if($row[4]=="1")
                                {
                                    echo "Active";
                                }
                                else
                                    {
                                        echo "Inactive";
                                    }
                                ?></td>
                            <td><?php echo $row[5] ?></td>
                        </tr>


                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                         <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Date of Staff Added</th>
                    </tr>
                    </tfoot>
                </table>

            </div>

            <?php
        }
        else
        {
            ?>
             <div class="container">
                 <div class="row">
                     <h3 class="text-danger">No record found!</h3>
                 </div>

             </div>
             <?php
        }

    }
}

?>