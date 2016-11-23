<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Booth</h3>
            </div>
            <div class="title_right">
                <div class="col-md-4 col-sm-4 col-xs-12 pull-right  form-group top_search">
                    <a href="<?php echo base_url ('constitutency/polling_station') ?>">
                        <button class="btn btn-warning" type="submit">
                            <i class="fa fa-eye"></i> Polling Station Listing</button></a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Booth<small>Booth</small></h2>
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
                            echo form_label ('Polling Station *', 'polling_station', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                if ($polling_station -> num_rows () > 0)
                                {
                                    foreach ($polling_station -> result () as $polling_station_list)
                                    {
                                        $polling_station_[$polling_station_list -> id] = $polling_station_list -> unique_id;
                                    }
                                }
                                $attributes = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom'];
                                echo form_dropdown ('polling_station_id', $polling_station_, set_value ('polling_station'), $attributes);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Booth ID *', 'unique_id', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'unique_id',
                                    'id'          => 'unique_id',
                                    'value'       => 'booth_' . set_value ('unique_id'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Polling Station ID',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('English Name*', 'english_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'english_name',
                                    'id'          => 'english_name',
                                    'value'       => set_value ('english_name'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'English Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Hindi Name *', 'hindi_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'hindi_name',
                                    'id'          => 'transliterateDiv',
                                    'value'       => set_value ('hindi_name'),
                                    'class'       => 'form-control col-md-7 col-xs-12 ',
                                    'placeholder' => 'Hindi Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                                <span>Press Space after every word</span>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Total voter Booth*', 'voter_booth', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'total_voter_booth',
                                    'value'       => set_value ('total_voter_booth'),
                                    'class'       => 'form-control col-md-7 col-xs-12 hindifont',
                                    'placeholder' => 'Total voter booth',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>


                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Voter TurnOut*', 'voter_turnout', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'voter_turnout',
                                    'value'       => set_value ('voter_turnout'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Voter turnout',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Male Voter TurnOut*', 'male_voter_turnout', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'male_voter_turnout',
                                    'value'       => set_value ('male_voter_turnout'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Male Voter turnout',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Female Voter TurnOut*', 'female_voter_turnout', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'female_voter_turnout',
                                    'value'       => set_value ('female_voter_turnout'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Female Voter turnout',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>



                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Target*', 'target', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'target',
                                    'value'       => set_value ('target'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'target',
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
                                    'value'   => 'Add Booth',
                                    'type'    => 'submit',
                                    'class'   => 'btn btn-success',
                                    'content' => 'Add Booth',];
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

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Upload CSV<small>Booth</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                        $attributes = ["class" => 'form-horizontal form-label-left'];
                        echo form_open_multipart ('/constitutency/booth/csv_upload', $attributes);
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
                            $attributes = ['class' => 'control-label col-md-2 col-sm-2 col-xs-12',];
                            echo form_label ('Select File *', 'unique_id', $attributes);
                            ?>
                            <div class="col-md-10 col-sm-10 col-xs-12">
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
                            $attributes = ['class' => 'control-label col-md-2 col-sm-2 col-xs-12',];
                            echo form_label ('Format', 'unique_id', $attributes);
                            ?>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                Please upload only csv file                            
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-2 col-sm-2 col-xs-12',];
                            echo form_label ('Fields', 'unique_id', $attributes);
                            ?>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                Year | Unique ID | English Name | Hindi Name | polling station ID(Sno) 
                                | Total voter booth | Voter turnout | Male voter turnout |
                                Female voter turnout | Target
                            </div>
                        </div>
                        
                      
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-2 col-sm-2 col-xs-12',];
                            echo form_label ('Sample', '', $attributes);
                            ?>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <a href="<?php echo base_url ('downloads/booth.csv') ?>"  download >
                                    <button type="button" class="btn btn-info btn-md">
                                        Click to download Sample
                                    </button>
                                </a>
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
                                    'content' => 'Add Booth',];
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