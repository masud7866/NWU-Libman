<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/27/2018
 * Time: 7:14 PM
 */

namespace app\views;

use app\templates;

class borrowings extends templates\main_template
{
    public $db = null;

    public function title()
    {
        ?>
        Borrowings
        <?php
    }

    public function content()
    {
        $borrowings = $this->db->get_all_borrowings();
        if ($borrowings !== false) {
            ?>
            <div class="container">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Edition</th>
                        <th>Tag</th>
                        <th>Subject</th>
                        <th>Authors</th>
                        <th>Member Name</th>
                        <th>Due By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($borrowings as $row)
                    {

                        ?>
                        <tr>
                            <td><?php echo $row["books_title"]; ?></td>
                            <td><?php echo $row["edition"]; ?></td>
                            <td><?php echo $row["book_tag"]; ?></td>
                            <td><?php echo $row["subject"]; ?></td>
                            <td><?php echo $row["authors"]; ?></td>
                            <td><?php echo $row["member_name"]; ?></td>
                            <td><?php echo $row["due_by"]; ?></td>

                            <td>
                                <?php if($row['status'] == 1){ ?>
                                <a href="return/<?php echo $row['id'] . "/" . $row["book_tag"]; ?>"><i class="glyphicon glyphicon-backward"></i> Return</a>
                                    <?php } ?>
                            </td>

                        </tr>


                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Book Title</th>
                        <th>Edition</th>
                        <th>Tag</th>
                        <th>Subject</th>
                        <th>Authors</th>
                        <th>Member Name</th>
                        <th>Due By</th>
                        <th>Action</th>
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