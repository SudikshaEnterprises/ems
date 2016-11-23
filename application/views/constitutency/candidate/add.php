<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Anubagh</h3>
            </div>
            <div class="title_right">
                <div class="col-md-3 col-sm-3 col-xs-12 pull-right  form-group top_search">
                    <a href="<?php echo base_url ('constitutency/candidate')?>">
                        <button class="btn btn-warning" type="submit">
                        <i class="fa fa-eye"></i> candidate Listing</button></a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Candidate Record<small>Candidate Record</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="<?php echo base_url('constitutency/thana/'); ?>">View
                                    Candidate Record List</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                        $attributes = ["class" => 'form-horizontal form-label-left'];
                        echo form_open_multipart ('', $attributes);
                        if (validation_errors () != '')
                        {
                            ?>
                            <div class="alert alert-danger alert-dismissible">
                                <?php
                                $data = ['name'         => 'button',
                                    'class'        => 'close',
                                    'data-dismiss' => 'alert',
                                    'type'         => 'button',
                                    'content'      => '<i class = "fa fa-remove"></i>',];
                                echo form_button ($data);
                                ?><?php echo validation_errors (); ?>
                            </div>
                        <?php } ?>
                        <?php echo $this -> session -> flashdata ('message'); ?>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Year *', 'year', $attributes);
                            ?>
                            <div class="col-md-4 col-sm-4 col-xs-16">
                                <?php
                                $data       = ['name'        => 'year',
                                    'id'          => 'year',
                                    'value'       => set_value ('year'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Year',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Candidate ID *', 'unique_id',
                                $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'unique_id',
                                    'id'          => 'unique_id',
                                    'value'       => 'REC_' . set_value('unique_id'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Record ID',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>
                       <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Booth ID *', 'booth_id',
                                $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                if ($booth->num_rows () > 0)
                                {
                                    foreach ($booth->result () as $booth_list)
                                    {
                                        $booth_id[$booth_list->id] = $booth_list->unique_id;
                                    }
                                }
                                $attributes = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom'];
                                echo form_dropdown ('booth_id', $booth_id, set_value ('booth_id'), $attributes);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Candidate Name*', 'candidate_name',
                                $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'candidate_name',
                                    'id'          => 'candidate_name',
                                    'value'       => set_value ('candidate_name'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Candidate Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Short Name *', 'party_short_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'party_short_name',
                                    'id'          => '',
                                    'value'       => set_value ('party_short_name'),
                                    'class'       => 'form-control col-md-7 col-xs-12 ',
                                    'placeholder' => 'Party Short Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Vote Get *', 'vote_get', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'vote_get',
                                    'id'          => '',
                                    'value'       => set_value ('vote_get'),
                                    'class'       => 'form-control col-md-7 col-xs-12 ',
                                    'placeholder' => 'Vote Get',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <?php
                                $data       = ['name'    => 'submit',
                                    'value'   => 'Sign_in',
                                    'type'    => 'submit',
                                    'class'   => 'btn btn-success',
                                    'content' => 'Add Cadidate Record',];
                                echo form_button ($data);
                                ?>
                            </div>
                        </div>
                        <?php
                        echo form_close ();
                        ?>
                    </div>


                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Upload CSV<small>Candidate</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                        $attributes = ["class" => 'form-horizontal form-label-left'];
                        echo form_open_multipart ('/constitutency/candidate/csv_upload', $attributes);
                        if (validation_errors () != '')
                        {
                            ?>
                            <div class="alert alert-danger alert-dismissible">
                                <?php
                                $data = ['name'         => 'button',
                                    'class'        => 'close',
                                    'data-dismiss' => 'alert',
                                    'type'         => 'button',
                                    'content'      => '<i class = "fa fa-remove"></i>',];
                                echo form_button ($data);
                                ?><?php echo validation_errors (); ?>
                            </div>
                        <?php } ?>
                        <?php echo $this -> session -> flashdata ('message'); ?>

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Select File *', 'unique_id', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'      => 'csv',
                                    'id'        => 'csv',
                                    'type'      => 'file',
                                    'class'     => 'form-control    ',
                                    'data-size' => 'sm',
                                ];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Format', 'unique_id', $attributes);
                            ?>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                Please upload only csv file                            
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Fields', '', $attributes);
                            ?>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                Year | Unique ID | Candidate name | Party short name | vote get | Anubagh ID 
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Sample', '', $attributes);
                            ?>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <a href="<?php echo base_url ('downloads/candidate.csv') ?>"  download ><button type="button" class="btn btn-info btn-md">Click to download Sample</button></a>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <?php
                                $data       = ['name'    => 'submit',
                                    'value'   => 'Sign_in',
                                    'type'    => 'submit',
                                    'class'   => 'btn btn-success',
                                    'content' => 'Add candidate',];
                                echo form_button ($data);
                                ?>
                            </div>
                        </div>
                        <?php
                        echo form_close ();
                        ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>



