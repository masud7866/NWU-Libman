<?php
/**
 * Created by PhpStorm.
 * User: Minhaz Rahman
 * Date: 3/28/2018
 * Time: 7:35 PM
 */
namespace app\views;

use app\templates;

class update_manager extends templates\main_template
{

    public function title()
    {
        ?>
        Update Manager Info
        <?php
    }

    public function content()
    {
        ?>
        <div class="container">

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
        <?php
    }

}

?>