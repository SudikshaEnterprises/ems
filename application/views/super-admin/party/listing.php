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
                        <h2>Party's List</h2>
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
                                    <th>Party Short Name</th>
                                    <th>Party English Name</th>
                                    <th>Party Hindi Name</th>
                                    <th>Party Slogan</th>
                                    <th>Party Color</th>
                                    <th>Party TopBar Color</th>
                                    <th>Leader 1</th>
                                    <th>Leader 2</th>
                                    <th>Leader 3</th>
                                    <th>Party Vote Sign</th>
                                    <th>Party Flag</th>
                                    <th>State Name</th>
                                    <th>District Name</th>
                                    <th>Zone Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($party_data -> num_rows () > 0)
                                {
                                    ?>
                                <tbody>
                                    <?php
                                    foreach ($party_data -> result () as $party)
                                    {
                                        $status = get_status ($party -> status);
                                        ?>
                                        <tr>
                                            <td><?php echo $party -> short_name; ?></td>
                                            <td><?php echo $party -> english_name; ?></td>
                                            <td><?php echo $party -> hindi_name; ?></td>
                                            <td><?php echo $party -> slogan; ?></td>
                                            <td><?php echo $party -> color; ?></td>
                                            <td><?php echo $party -> top_bar_color; ?></td>
                                            <td><img src="<?php echo base_url ('uploads/party/'.$party -> leader_1); ?>" width="30"></td>
                                            <td><img src="<?php echo base_url ('uploads/party/'.$party -> leader_2); ?>" width="30"></td>
                                            <td><img src="<?php echo base_url ('uploads/party/'.$party -> leader_3); ?>" width="30"></td>
                                            <td><img src="<?php echo base_url ('uploads/party/'.$party -> vote_sign); ?>" width="30"></td>
                                            <td>
                                                <img src="<?php echo base_url ('uploads/party/'.$party -> party_flag); ?>" width="30">
                                            </td>
                                            <td><?php echo $party -> state; ?></td>
                                            <td><?php echo $party -> district; ?></td>
                                            <td><?php echo $party -> zone; ?></td>
                                            <td><a href="<?php echo site_url ('party/change_status/' . $party -> id) . '/' . $status['status'] ?>"
                                                   class="btn btn-xs btn-info"><?php echo $status['text']; ?></a></td>
                                            <td>

                                                <a href="<?php echo site_url ('party/delete/' . $party -> id) ?>">
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
