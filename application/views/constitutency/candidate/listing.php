<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Candidate Listing</h3>
            </div>

            <div class="title_right">
                <div class="col-md-8 col-sm-8 col-xs-12 pull-right  form-group
                     pull-right top_search">
                    <a href="<?php echo base_url ('constitutency/candidate/add')
?>"><button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Add Candidate</button></a>
                    <a href="<?php echo base_url ('constitutency/candidate/download_csv')
?>"><button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Download Candidate</button></a>
                </div>
            </div>

            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Candidate Record's List</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="example" class="table table-striped responsive-utilities jambo_table">
                                <thead>
                                    <tr class="headings">
                                        <th>Sno.</th>
                                        <th>Record ID</th>
                                        <th>Year</th>
                                        <th>Booth ID</th>
                                        <th>Candidate Name</th>
                                        <th>Party Short Name</th>
                                        <th>Vote Get</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($candidate -> num_rows () > 0)
                                    {

                                        foreach ($candidate -> result () as $list)
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-transform:uppercase"><?php echo
                                    $list -> id;
                                            ?></td>
                                                <td><?php echo $list -> unique_id; ?></td>
                                                <td><?php echo $list -> year; ?></td>
                                                <td><?php echo $list -> booth_unique_id; ?></td>
                                                <td><?php echo $list -> candidate_name; ?></td>
                                                <td><?php echo $list -> party_short_name; ?></td>
                                                <td><?php echo $list -> vote_get; ?></td>


                                                <td>
                                                    <a href="<?php echo site_url ('constitutency/candidate/edit/' . $list -> id) ?>">
                                                        <i class="fa fa-pencil"></i></a>
                                                    <a href="<?php echo site_url ('constitutency/candidate/delete/' . $list -> id) ?>">
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
