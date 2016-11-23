<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Admin</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Admin's List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>FaceBook ID</th>
                                    <th>Admin Profile picture</th>
                                    <th>User ID</th>
                                    <th>Group</th>
                                    <th>Admin Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($admins -> num_rows () > 0)
                                {
                                    ?>
                                <tbody>
                                    <?php
                                    foreach ($admins -> result () as $admin)
                                    {
                                        $status = get_status ($admin -> status);
                                        ?>
                                        <tr>
                                            <td style="text-transform:uppercase"><?php
                                                echo $admin -> first_name . " " .
                                                $admin -> last_name;
                                                ?></td>
                                            <td><?php echo $admin -> email; ?></td>
                                            <td><?php
                                                echo $admin -> mobile . ", <br>" .
                                                $admin -> phone;
                                                ?></td>
                                            <td><?php echo $admin -> facebook_id; ?></td>
                                            <td><img src="<?php
                                                     echo
                                                     base_url ('uploads/admin/' . $admin -> profile_photo);
                                                     ?>" width="60"></td>
                                            <td><?php echo $admin -> user_id; ?></td>
                                            <td><?php echo $admin -> category; ?></td>
                                            <td><a href="<?php echo site_url ('admin/change_status/' . $admin -> id) . '/' . $status['status'] ?>"
                                                   class="btn btn-xs btn-info"><?php echo $status['text']; ?></a></td>
                                            <td>
                                                <a href="<?php echo site_url ('admin/edit/' . $admin -> id) ?>">
                                                    <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo site_url ('admin/delete/' . $admin -> first_name) ?>">
                                                    <i class="fa fa-trash-o"></i></a>
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
    </div>
</div>
</div>
