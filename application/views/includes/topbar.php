<link href="<?php echo base_url ('assets/css/bootstrap.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url ('assets/fonts/css/font-awesome.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url ('assets/css/animate.min.css');?>" rel="stylesheet">
<!-- Custom styling plus plugins -->
<link href="<?php echo base_url ('assets/css/custom.css');?>" rel="stylesheet">
<link href="<?php echo base_url ('assets/css/icheck/flat/green.css');?>" rel="stylesheet">
<script src="<?php echo base_url ('assets/js/jquery.min.js');?>"></script>
<!-- select2 -->
<link href="<?php echo base_url ('assets/css/select/select2.min.css');?>" rel="stylesheet">
<style>
    .user-profile1 > img{
        width:60px;
        height:60px;
    }
    <?php
    if ($party_data->num_rows () > 0)
    {
        foreach ($party_data->result () as $party)
        {
            $color = $party->top_bar_color;
        }
    }
    ?>
    .nav_menu {
        float: left;
        background: <?php echo $color;?>; 
        border-bottom: 1px solid #D9DEE4;
        margin-bottom: 10px;
        width: 100%;
    }
</style>
<?php
if ($this->session->userdata ('BmsCartAdminUserType') == 'super-admin'):
    $user = 'Super Admin';
elseif ($this->session->userdata ('BmsCartAdminUserType') == 'admin'):
    $user = 'Admin';
elseif ($this->session->userdata ('BmsCartAdminUserType') == 'sub-admin'):
    $user = 'Sub Admin';
elseif ($this->session->userdata ('BmsCartAdminUserType') == 'volunteer'):
    $user = 'Volunteer';
endif;
?>


<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <?php
            if ($party_data->num_rows () > 0)
            {
                foreach ($party_data->result () as $party)
                {
                    ?>
                    <a href="javascript:;" class="user-profile1">
                        <img src="<?php echo base_url ('uploads/party/' . $party->leader_1);?>" class="img-circle"
                             title="Party leader 1" alt="" />
                        </span>
                    </a>&nbsp;
                    <a href="javascript:;" class="user-profile1">
                        <img src="<?php echo base_url ('uploads/party/' . $party->leader_2);?>" class="img-circle"
                             title="Party leader 2" alt="" />
                        </span>
                    </a>&nbsp;
                    <a href="javascript:;" class="user-profile1">
                        <img src="<?php echo base_url ('uploads/party/' . $party->leader_3);?>" class="img-circle"
                             title="Party leader 3" alt="" />
                        </span>
                    </a>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" 
                               aria-expanded="false">
                                <img src="<?php echo base_url ('uploads/party/' . $party->vote_sign);?>" 
                                     alt=""><?php echo $user; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li><a href="<?php echo base_url ('SuperAdmin/logout');?>">
                                        <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>                    <?php
                }
            }
            ?>

        </nav>
    </div>
</div>