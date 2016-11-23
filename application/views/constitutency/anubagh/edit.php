<?php $anubgah_data = $anubagh->row ();?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Update Anubagh</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Anubagh<small>Anubagh</small></h2>
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
                                $data = ['name'    => 'button',
                                    'class'        => 'close',
                                    'data-dismiss' => 'alert',
                                    'type'         => 'button',
                                    'content'      => '<i class = "fa fa-remove"></i>',];
                                echo form_button ($data);
                                ?><?php echo validation_errors ();?>
                            </div>
                        <?php }?>
                        <?php echo $this->session->flashdata ('message');?>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Year *', 'year', $attributes);
                            ?>
                            <div class="col-md-2 col-sm-2 col-xs-16">
                                <?php
                                $data       = ['name'        => 'year',
                                    'id'          => 'year',
                                    'value'       => set_value ('year', $anubgah_data->year),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Year',
                                    'required'    => '',];
                                echo form_input ($data);
                                echo form_hidden ('id',$anubgah_data->id);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Thana ID', 'first_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'unique_id',
                                    'id'          => 'unique_id',
                                    'value'       => set_value ('unique_id',$anubgah_data->unique_id),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Thana ID',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>


                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Anubagh Name English *', 'english_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        =>  'english_name',
                                    'id'          => 'english_name',
                                    'value'       => set_value ('english_name', $anubgah_data->english_name),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Anubagh English Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>


                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Anubagh Name Hindi *', 'hindi_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        =>  'hindi_name',
                                    'id'          => 'transliterateDiv',
                                    'value'       => set_value ('hindi_name', $anubgah_data->hindi_name),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Anubagh Hindi Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Total Vters *', 'total_voters',
                                $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data  = ['name' => 'total_voters',
                                    'id'          => '',
                                    'value'       => set_value
                                    ('total_voters', $anubgah_data->total_voters),
                                    'class'       => 'form-control col-md-7 col-xs-12 ',
                                    'placeholder' => 'Total Voters',
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
                                    'value'   => 'Update Anubagh',
                                    'type'    => 'submit',
                                    'class'   => 'btn btn-success',
                                    'content' => 'Update Thana',];
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