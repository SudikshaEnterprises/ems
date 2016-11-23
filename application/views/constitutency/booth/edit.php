<?php $booth_data = $booth -> row (); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Update Booth</h3>
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
                        <h2>Edit Booth<small> Booth</small></h2>
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
                            <div class="col-md-2 col-sm-2 col-xs-16">
                                <?php
                                $data       = ['name'        => 'year',
                                    'id'          => 'year',
                                    'value'       => set_value ('year', $booth_data->year),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Year',
                                    'required'    => '',];
                                echo form_input ($data);
                                echo form_hidden ('id',$booth_data->id);
                                ?>
                            </div>
                        </div>
                         <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Polling Station *', 'ward', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                if ($polling_station->num_rows () > 0)
                                {
                                    foreach ($polling_station->result () as $polling_station_list)
                                    {
                                        $ward_[$polling_station_list->id] = $polling_station_list->unique_id;
                                    }
                                }
                                $attributes        = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom'];
                                echo form_dropdown ('polling_station_id', $ward_, set_value ('polling_station_id', $booth_data->polling_station_id), $attributes);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Booth ID', 'unique_id', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'unique_id',
                                    'id'          => 'unique_id',
                                    'value'       => set_value ('unique_id', $booth_data->unique_id),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Booth ID',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>


                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Booth Name English *', 'english_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        =>  'english_name',
                                    'id'          => 'english_name',
                                    'value'       => set_value ('english_name', $booth_data->english_name),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Booth English Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>


                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Booth Name Hindi *', 'hindi_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        =>  'hindi_name',
                                     'id'          => 'transliterateDiv',
                                    'value'       => set_value ('hindi_name', $booth_data->hindi_name),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Booth Hindi Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php

                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Total voter Booth*','voter_booth',$attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name' => 'total_voter_booth',
                                    'id'          => 'transliterateDiv',
                                    'value'       => set_value('total_voter_booth',$booth_data -> total_voter_booth),
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
                            echo form_label ('Voter TurnOut*','voter_turnout',
                                $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name' => 'voter_turnout',
                                    'id'          => 'transliterateDiv',
                                    'value'       => set_value
                                    ('voter_turnout', $booth_data->voter_turnout),
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
                            echo form_label ('Male Voter TurnOut*',
                                'male_voter_turnout',
                                $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name' => 'male_voter_turnout',
                                    'id'          => 'transliterateDiv',
                                    'value'       => set_value
                                    ('male_voter_turnout',$booth_data->male_voter_turnout),
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
                            echo form_label ('Female Voter TurnOut*',
                                'female_voter_turnout',
                                $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name' => 'female_voter_turnout',
                                    'id'          => 'transliterateDiv',
                                    'value'       => set_value
                                    ('female_voter_turnout',$booth_data->female_voter_turnout),
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
                            echo form_label ('Target*','target',$attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name' => 'target',
                                    'id'          => 'transliterateDiv',
                                    'value'       => set_value ('target',$booth_data->target),
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
                                $data              = ['name'    => 'submit',
                                    'value'   => 'Update booth',
                                    'type'    => 'submit',
                                    'class'   => 'btn btn-success',
                                    'content' => 'Update booth',];
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