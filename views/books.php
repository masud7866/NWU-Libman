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
        if ($this->db->get_all_books() !== null) {
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
                        <th>Book Added Date</th>
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
                        <th>Book Added Date</th>
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
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <?php
        }

    }
}

?>