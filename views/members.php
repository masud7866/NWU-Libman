<?php
/**
 * Created by PhpStorm.
 * User: masud
 * Date: 28-Mar-18
 * Time: 10:10 AM
 */

namespace app\views;

use app\templates;

class members extends templates\main_template
{
    public $db = null;

    public function title()
    {
        ?>
        Members
        <?php
    }

    public function content()
    {
        if ($this->db->get_all_members() !== null) {
            ?>
            <div class="container">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Type</th>
                        <th>ID</th>
                        <th>Date of Join</th>
                        <th>Date of Member Added</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($this->db->get_all_members() as $row)
                    {

                        ?>
                        <tr>
                            <td><?php echo $row[1] ?></td>
                            <td><?php echo $row[2] ?></td>
                            <td><?php echo $row[3] ?></td>
                            <td><?php echo $row[4] ?></td>
                            <td><?php
                                $id = $this->db->get_members_meta($row[0],'id');
                                if($id)
                                {
                                    foreach ($id as $id)
                                    {
                                        echo $id[0];
                                    }
                                }
                                ?></td>
                            <td><?php
                                $joined = $this->db->get_members_meta($row[0],'joined');
                                if($joined)
                                {
                                    foreach ($joined as $joined)
                                    {
                                        echo $joined[0];
                                    }
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
                        <th>Phone</th>
                        <th>Type</th>
                        <th>ID</th>
                        <th>Date of Join</th>
                        <th>Date of Member Added</th>
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