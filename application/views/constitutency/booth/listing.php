<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Booths Listing</h3>
            </div>

            <div class="title_right">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right top_search">
                    <a href="<?php echo base_url ('constitutency/booth/add')
                    ?>"><button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Add Booth</button></a>
                    <a href="<?php echo base_url ('constitutency/booth/download_csv')
                    ?>"><button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Download Booth</button></a>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Booths's List</h2>
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                         <table id="example" class="table table-striped responsive-utilities jambo_table">
                                <thead>
                                    <tr class="headings">
                                    <th>Sno</th>
                                    <th>Year</th>
                                    <th>Booth id</th>
                                    <th>Booth English Name</th>
                                    <th>Booth Hindi Name</th>
                                    <th>Total Voter Booth</th>
                                    <th>Voter Turnout</th>
                                    <th>Male Voter Turnout</th>
                                    <th>Female Voter Turnout</th>
                                    <th>Target</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($booth -> num_rows () > 0)
                                {
                                    foreach ($booth -> result () as $list)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $list -> id; ?></td>
                                            <td><?php echo $list -> year; ?></td>
                                            <td><?php echo $list -> unique_id; ?></td>
                                            <td><?php echo $list -> english_name; ?></td>
                                            <td><?php echo $list -> hindi_name; ?></td>
                                            <td><?php echo $list -> total_voter_booth; ?></td>
                                            <td><?php echo $list -> voter_turnout; ?></td>
                                            <td><?php echo $list -> male_voter_turnout; ?></td>
                                            <td><?php echo $list -> female_voter_turnout; ?></td>
                                            <td><?php echo $list -> target; ?></td>
                                            <td>
                                                <a href="<?php echo site_url ('constitutency/booth/edit/' . $list -> id) ?>">
                                                    <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo site_url ('constitutency/booth/delete/' . $list -> id) ?>">
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
