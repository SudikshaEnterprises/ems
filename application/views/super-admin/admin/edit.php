<?php $admin_data = $admin -> row (); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Admin Profile</h3>
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
                        <h2>Edit Admin<small>Admin</small></h2>
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
                            echo form_label ('Select Salutation *', 'Salutation', $attributes);
                            ?>
                            <div class="col-md-2 col-sm-2 col-xs-16">
                                <?php
                                $salutation_option = ["Mr."   => "Mr.",
                                    "Mrs."  => "Mrs.",
                                    "Dr."   => "Dr.",
                                    "Prof." => "Prof.",
                                    "Eng."  => "Eng."];
                                $attributes        = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom'];
                                echo form_dropdown ('salutation', $salutation_option, set_value ('salutation', $admin_data -> salutation), $attributes);
                                ?>
                            </div>
                        </div> 
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('First Name *', 'first_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'first_name',
                                    'id'          => 'first_name',
                                    'style'       => 'text-transform:uppercase',
                                    'value'       => set_value ('first_name', $admin_data -> first_name),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'First Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Last Name *', 'last_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'last_name',
                                    'id'          => 'last_name',
                                    'style'       => 'text-transform:uppercase',
                                    'value'       => set_value ('last_name', $admin_data -> last_name),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Last Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Address *', 'address', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'address',
                                    'id'          => 'address',
                                    'rows'        => '2',
                                    'value'       => set_value ('address', $admin_data -> address),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Address',
                                    'required'    => '',];
                                echo form_textarea ($data);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Email *', 'email', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'email',
                                    'type'        => 'email',
                                    'id'          => 'email',
                                    'value'       => set_value ('email', $admin_data -> email),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Email',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Mobile *', 'mobile', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'mobile',
                                    'id'          => 'mobile',
                                    'value'       => set_value ('mobile', $admin_data -> mobile),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Mobile',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>                        
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Phone *', 'phone', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'phone',
                                    'type'        => 'number',
                                    'id'          => 'phone',
                                    'value'       => set_value ('phone', $admin_data -> phone),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Phone',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>                        
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Facebook ID', 'facebook_id', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'facebook_id',
                                    'type'        => 'url',
                                    'id'          => 'facebook_id',
                                    'value'       => set_value ('facebook_id', $admin_data -> facebook_id),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Facebook id',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>                        
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('', '', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img
                                    src="<?php echo base_url ("uploads/admin/" . $admin_data -> main_screen_photo) ?>"
                                    title="Main Screen Image" alt="Main Screen Image" style=" width: 50px;" />
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Main Screen Image', 'image', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'      => 'main_screen_photo',
                                    'id'        => 'main_screen_photo',
                                    'type'      => 'file',
                                    'class'     => 'form-control',
                                    'data-size' => 'sm',
                                ];
                                echo form_input ($data);
                                echo form_hidden ('old_main_screen_photo', $admin_data -> main_screen_photo);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('', '', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img
                                    src="<?php echo base_url ("uploads/admin/" . $admin_data -> profile_photo) ?>"
                                    title="Brand Image" alt="Brand Image" style=" width: 50px;" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Profile Image', 'image', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'      => 'profile_photo',
                                    'id'        => 'profile_photo',
                                    'type'      => 'file',
                                    'class'     => 'form-control',
                                    'data-size' => 'sm',
                                ];
                                echo form_input ($data);
                                echo form_hidden ('old_profile_photo', $admin_data -> profile_photo);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Category', 'category', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $category          = ["1" => "Category 1", "2" => "Category 2"];
                                $attributes        = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom'];
                                echo form_dropdown ('category', $category, set_value ('category', $admin_data -> category), $attributes);
                                ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('User ID', 'user_id', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'user_id',
                                    'id'          => 'user_id',
                                    'value'       => set_value ('user_id', $admin_data -> category),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'User ID',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>                        
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes        = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Password', 'password', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data              = ['name'        => 'password',
                                    'id'          => 'password',
                                    'value'       => set_value ('password', $admin_data -> password),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Password',
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
                                echo form_dropdown ('status', $status, set_value ('status', $admin_data -> status), $attributes);
                                ?>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <?php
                                $data              = ['name'    => 'submit',
                                    'value'   => 'Sign_in',
                                    'type'    => 'submit',
                                    'class'   => 'btn btn-success',
                                    'content' => 'Add Admin',];
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