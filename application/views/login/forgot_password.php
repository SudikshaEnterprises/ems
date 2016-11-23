<div class="panel-heading">
	<h3 class="text-center"> Sign In to <strong
			class="text-custom"><?php echo config_item('site_name'); ?></strong></h3>
</div>
<div class="panel-body">
	<?php
		$attributes = ['class' => 'form-horizontal m-t-20'];
		echo form_open('', $attributes);
	?>
	<?php if(validation_errors() != ''){ ?>
		<div class="alert alert-danger alert-dismissible">
			<?php
				$data = ['name'         => 'button',
						 'class'        => 'close',
						 'data-dismiss' => 'alert',
						 'type'         => 'button',
						 'content'      => '<i class = "fa fa-remove"></i>',];
				echo form_button($data);
			?><?php echo validation_errors(); ?>
		</div>
	<?php } ?>
	<?php echo $this->session->flashdata('message'); ?>
	<div class="form-group ">
		<div class="col-xs-12">
			<?php
				$data = ['name'            => 'email',
						 'id'              => 'email',
						 'placeholder'     => 'email',
						 'value'           => set_value('email'),
						 'class'           => 'form-control',
						 'autofocus'       => 1,
						 'parsley-trigger' => 'change',
						 'required'        => 'required'];
				echo form_input($data);
			?>
		</div>
	</div>
	<div class="form-group text-center m-t-40">
		<div class="col-xs-12">
			<?php
				$data = ['name'    => 'submit',
						 'value'   => 'Sign_in',
						 'type'    => 'submit',
						 'class'   => 'btn btn-pink btn-block text-uppercase waves-effect waves-light',
						 'content' => 'Forgot Password',];
				echo form_button($data);
			?>
		</div>
	</div>
	<div class="form-group m-t-30 m-b-0">
		<div class="col-sm-12">
			<a href="<?php echo site_url('admin/login') ?>" class="text-dark"><i
					class="fa fa-lock m-r-5"></i>Login</a>
		</div>
	</div>
	<?php
		echo form_close();
	?>
</div>