<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Party</h3>
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
                        <h2>Create Party</h2>
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
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Short name *', 'short_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $short_name_option = ["1" => "Party short name 1",
                                    "2" => "Party short name 2",
                                    "3" => "Party short name 3",];
                                $attributes        = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom'];
                                echo form_dropdown ('short_name', $short_name_option, set_value ('short_name'), $attributes);
                                ?>
                            </div>
                        </div> 
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Name English *', 'first_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'english_name',
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
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Name Hindi *', 'hindi_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'hindi_name',
                                    'id'          => 'hindi_name',
                                    'value'       => set_value ('hindi_name'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Hindi Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Slogan *', 'slogan', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'slogan',
                                    'id'          => 'slogan',
                                    'value'       => set_value ('slogan'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Slogan',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Color *', 'slogan', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'color',
                                    'id'          => 'color',
                                    'value'       => set_value ('color'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Color',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Top Bar Color *', 'slogan', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'top_bar_color',
                                    'id'          => 'top_bar_color',
                                    'value'       => set_value ('top_bar_color'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'top_bar_color',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Leader 1 Picture', 'leader_1', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'      => 'leader_1',
                                    'id'        => 'leader_1',
                                    'type'      => 'file',
                                    'class'     => 'form-control',
                                    'data-size' => 'sm',
                                ];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Leader 2 Picture', 'leader_2', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'      => 'leader_2',
                                    'id'        => 'leader_2',
                                    'type'      => 'file',
                                    'class'     => 'form-control',
                                    'data-size' => 'sm',
                                ];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Leader 3 Picture', 'leader_3', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'      => 'leader_3',
                                    'id'        => 'leader_3',
                                    'type'      => 'file',
                                    'class'     => 'form-control',
                                    'data-size' => 'sm',
                                ];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Vote Sign', 'vote_sign', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'      => 'vote_sign',
                                    'id'        => 'vote_sign',
                                    'type'      => 'file',
                                    'class'     => 'form-control',
                                    'data-size' => 'sm',
                                ];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Flag', 'party_flag', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'      => 'party_flag',
                                    'id'        => 'party_flag',
                                    'type'      => 'file',
                                    'class'     => 'form-control',
                                    'data-size' => 'sm',
                                ];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('State Name *', 'state', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'state',
                                    'id'          => 'state',
                                    'value'       => set_value ('state'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'state',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('District Name *', 'district', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'district',
                                    'id'          => 'district',
                                    'value'       => set_value ('district'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'district',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Zone Name *', 'zone', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'zone',
                                    'id'          => 'zone',
                                    'value'       => set_value ('zone'),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'zone',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Status', 'status', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $status            = ["1" => "Active", "2" => "Deactive"];
                                $attributes        = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom'];
                                echo form_dropdown ('status', $status, set_value ('status'), $attributes);
                                ?>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <?php
                                $data              = ['name'    => 'submit',
                                    'value'   => 'Add Party',
                                    'type'    => 'submit',
                                    'class'   => 'btn btn-success',
                                    'content' => 'Add Party',];
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