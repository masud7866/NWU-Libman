<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/27/2018
 * Time: 7:14 PM
 */

namespace app\views;

use app\templates;

class books extends templates\main_template
{
    public $db = null;

    public function title()
    {
        ?>
        Books
        <?php
    }

    public function content()
    {
        if ($this->db->get_all_books() !== false) {
            ?>
            <div class="container">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Edition</th>
                        <th>Subject</th>
                        <th>Authors</th>
                        <th>Date of Book Added</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($this->db->get_all_books() as $row)
                    {

                        ?>
                        <tr>
                            <td></td>
                            <td><?php echo $row[1] ?></td>
                            <td><?php echo $row[2] ?></td>
                            <td><?php echo $row[3] ?></td>
                            <td><?php
                                $authors = $this->db->get_books_meta($row[0],'author');
                                if($authors)
                                {
                                    $tmpAuthor = "";
                                    foreach ($authors as $author)
                                    {
                                        $tmpAuthor.= $author[0] . ", ";
                                    }
                                    echo substr($tmpAuthor,0,strlen($tmpAuthor)-2);
                                }
                                ?></td>
                            <td><?php echo $row[4] ?></td>
                        </tr>


                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Edition</th>
                        <th>Subject</th>
                        <th>Authors</th>
                        <th>Date of Book Added</th>
                    </tr>
                    </tfoot>
                </table>


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