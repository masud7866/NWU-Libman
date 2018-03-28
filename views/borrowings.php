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
                        <th>Subject</th>
                        <th>Authors</th>
                        <th>Member Name</th>
                        <th>Due By</th>
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
                            <td><?php echo $row["subject"]; ?></td>
                            <td><?php echo $row["authors"]; ?></td>
                            <td><?php echo $row["member_name"]; ?></td>
                            <td><?php echo $row["due_by"]; ?></td>
                        </tr>


                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Book Title</th>
                        <th>Edition</th>
                        <th>Subject</th>
                        <th>Authors</th>
                        <th>Member Name</th>
                        <th>Due By</th>
                    </tr>
                    </tfoot>
                </table>

                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Info
                </button>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Books Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title" name="title" class="form-control"
                                                       required=""
                                                       placeholder="Book Title..."/>
                                            </div>
                                            <div class="form-group">
                                                <label for="edition">Edition</label>
                                                <input type="text" id="edition" name="edition" class="form-control"
                                                       required=""
                                                       placeholder="Book Edition..."/>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" id="subject" name="subject" class="form-control"
                                                       required=""
                                                       placeholder="Subject..."/>
                                            </div>
                                        </form>

                                        <div class="col-lg-6">
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <th class="info">Author</th>
                                                    <th colspan="2" class="info">Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>John</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info">Edit</button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mary</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info">Edit</button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>July</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info">Edit</button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <div class="col-lg-6">
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <th class="info">Tag</th>
                                                    <th colspan="2" class="info">Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>zxc123</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info">Edit</button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>zxc456</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info">Edit</button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>zxc789</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info">Edit</button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


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