<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/28/2018
 * Time: 7:35 PM
 */

namespace app\views;

use app\templates;

class update_books extends templates\main_template
{
    public $id = null;
    public $err_msg = null;
    public function title()
    {
        ?>
        Update Books Info
        <?php
    }

    public function content()
    {
        $db = new \db();
        $book = $db->get_book_by_id($this->id);
        $authors = $db->get_books_meta($book[0],'author');
        $tags = $db->get_books_meta($book[0],'tag');
        ?>
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                    <?php

                    if ($this->err_msg != null) {
                        echo $this->err_msg;
                        echo "<br>";
                    }

                    ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control"
                                   required=""
                                   value="<?php echo $book[1] ?>"
                                   placeholder="Book Title..."/>
                        </div>
                        <div class="form-group">
                            <label for="edition">Edition</label>
                            <input type="text" id="edition" name="edition" class="form-control"
                                   required=""
                                   value="<?php echo $book[2] ?>"
                                   placeholder="Book Edition..."/>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control"
                                   required=""
                                   value="<?php echo $book[3] ?>"
                                   placeholder="Subject..."/>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-danger" href="../delete/<?php echo $this->id ; ?>">Delete</a>
                    </form>
                    <div class="clearfix"></div>
                    <div style="padding: 10px 5px"></div>
                    <div class="col-lg-6">
                        <a class="btn btn-default" href="#">Add author</a>
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th class="info">Author</th>
                                <th colspan="2" class="info">Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            if($authors)
                            {

                                foreach ($authors as $author)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $author[0] ?></td>
                                        <td>
                                            <a href="../delete/<?php echo $book[0] ?>/author/<?php echo $author[0] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>




                            </tbody>
                        </table>
                    </div>


                    <div class="col-lg-6">
                        <a class="btn btn-default" href="#">Add to stock</a>
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th class="info">Tag</th>
                                <th colspan="2" class="info">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            if($tags)
                            {

                                foreach ($tags as $tag)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $tag[0] ?></td>
                                        <td>
                                            <a href="../delete/<?php echo $book[0] ?>/tag/<?php echo $tag[0] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}

?>