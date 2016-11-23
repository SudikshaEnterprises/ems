<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Polling Station</h3>
            </div>
            <div class="title_right">
                <div class="col-md-4 col-sm-4 col-xs-12 pull-right  form-group top_search">
                    <a href="<?php echo base_url ('constitutency/polling_station')?>">
                        <button class="btn btn-warning" type="submit">
                        <i class="fa fa-eye"></i> Polling Station Listing</button></a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Polling Station<small>Polling Station</small></h2>
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
                            echo form_label ('Select Year *', 'year', $attributes);
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
                            echo form_label ('Ward *', 'ward', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                if ($ward->num_rows () > 0)
                                {
                                    foreach ($ward->result () as $ward_list)
                                    {
                                        $ward_[$ward_list->id] = $ward_list->unique_id;
                                    }
                                }
                                $attributes        = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom'];
                                echo form_dropdown ('ward_id', $ward_, set_value ('ward'), $attributes);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Polling Station ID *', 'unique_id', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'unique_id',
                                    'id'          => 'unique_id',
                                    'value'       => 'ps_' . set_value ('unique_id'),
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
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <?php
                                $data       = ['name'    => 'submit',
                                    'value'   => 'Sign_in',
                                    'type'    => 'submit',
                                    'class'   => 'btn btn-success',
                                    'content' => 'Add Polling Station',];
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
                        <h2>Upload CSV<small>Polling Station</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                        $attributes = ["class" => 'form-horizontal form-label-left'];
                        echo form_open_multipart ('/constitutency/polling_station/csv_upload', $attributes);
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
                            <div class="col-md-9 col-sm-9 col-xs-12">
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
                                Year | Unique ID | English Name | Hindi Name | Ward ID(Sno of ward) 
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Sample', '', $attributes);
                            ?>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <a href="<?php echo base_url ('downloads/polling_station.csv') ?>"  download >
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
                                    'content' => 'Add Polling Station',];
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




                      