<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <?php
                echo form_open ('');
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

                <h1>Admin Login</h1>
                <div>
                    <?php
                    $data = ['name'            => 'username',
                        'id'              => 'username',
                        'placeholder'     => 'Username',
                        'value'           => set_value ('username'),
                        'class'           => 'form-control',
                        'autofocus'       => 1,
                        'parsley-trigger' => 'change',
                        'required'        => 'required'];
                    echo form_input ($data);
                    ?>
                </div>
                <div>
                    <?php
                    $data = ['name'            => 'password',
                        'id'              => 'password',
                        'placeholder'     => 'password',
                        'class'           => 'form-control',
                        'parsley-trigger' => 'change',
                        'required'        => 'required'];
                    echo form_password ($data);
                    ?>
                </div>
                <div>
                    <?php
                    $data = ['name'    => 'submit',
                        'value'   => 'Sign_in',
                        'type'    => 'submit',
                        'class'   => 'btn btn-default submit',
                        'content' => 'LOG IN',];
                    echo form_button ($data);
                    ?>
                    <!--<a href="<?php //echo site_url('admin/forgot_password') ?>" class="reset_pass"><i
					class="fa fa-lock m-r-5"></i> Forgot your
				password?</a>
                    -->
                </div>

                <div class="clearfix"></div>
                <?php
		echo form_close();
	?>
            </section>
        </div>


    </div>
</div>
