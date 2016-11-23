<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Thana</h3>
            </div>

            <div class="title_right">
                <div class="col-md-7 col-sm-7 col-xs-12 pull-right  form-group
                     pull-right top_search">
                    <a href="<?php echo base_url ('constitutency/thana/add')
                    ?>"><button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Add Thana</button></a>
                    <a href="<?php echo base_url ('constitutency/thana/download_csv')
                    ?>"><button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Download Thana</button></a>
                </div>
            </div>

            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Thana's List</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          
                                 <table id="example" class="table table-striped responsive-utilities jambo_table">

                                <thead>
                                    <tr class="headings">
                                        <th>Sno.</th>
                                        <th>Thana ID</th>
                                        <th>Year</th>
                                        <th>Thana name English</th>
                                        <th>Thana name Hindi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($thana -> num_rows () > 0)
                                    { 
                                        foreach ($thana -> result () as $list)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $list -> id; ?></td>
                                                <td><?php echo $list -> unique_id; ?></td>
                                                <td><?php echo $list -> year; ?></td>
                                                <td><?php echo $list -> english_name; ?></td>
                                                <td><?php echo $list -> hindi_name; ?></td>

                                                <td>
                                                <a href="<?php echo site_url ('constitutency/thana/edit/'.$list->id) ?>">
                                                        <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo site_url ('constitutency/thana/delete/'.$list->id) ?>">
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
