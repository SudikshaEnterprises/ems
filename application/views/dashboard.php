<style>
    .panel-default{
        border-radius:0px;
    }
    .btn{
        margin-bottom: 0px;
        border-radius:0px;
        background-color:#5a6a87;
        border:0px;
        color:#fff;
        transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
    }
    .btn:hover{
        border-radius:0px;
        background-color:#46597b;
        color:#fff;
    }
    .panel-body{
        padding-top:30px;
        padding-bottom:30px;
        background-color:#ccc;
    }
</style>
<div class="right_col" role="main">
    <br />    <br />    <br />    <br />
    <div class="row">
        <div class="col-sm-12">
            <?php
            if ($this->session->userdata ('BmsCartAdminUserType') == 'super-admin'):
                ?>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('admin');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" value="Admin"></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('party');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" value="Party"></a>
                    </div>
                </div>
                <?php
            endif;
            if ($this->session->userdata ('BmsCartAdminUserType') == 'admin' ||
                    $this->session->userdata ('BmsCartAdminUserType') == 'super-admin'):
                ?>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('#');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" 
                                   value="Manage Constitutency"></a>
                    </div>
                </div>
                <?php
            endif;
            if ($this->session->userdata ('BmsCartAdminUserType') == 'sub-admin' ||
                    $this->session->userdata ('BmsCartAdminUserType') == 'super-admin' ||
                    $this->session->userdata ('BmsCartAdminUserType') == 'admin'):
                ?>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('#');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" value="Manage Volunteer"></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('#');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" value="Voter List"></a>
                    </div>
                </div>
                <?php
            endif;
            if ($this->session->userdata ('BmsCartAdminUserType') == 'volunteer' ||
                    $this->session->userdata ('BmsCartAdminUserType') == 'super-admin' ||
                    $this->session->userdata ('BmsCartAdminUserType') == 'admin' ||
                    $this->session->userdata ('BmsCartAdminUserType') == 'sub-admin'):
                ?>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('#');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" value="Voter Connected"></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('#');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" value="Task Management"></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('#');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" value="Reports"></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('#');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" value="News Feed"></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('#');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" value="Biography"></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('#');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" value="Settings"></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa  fa-picture-o" style="font-size:50px; color:#fff;"></i>
                        </div>
                        <a href="<?php echo base_url ('#');?>">
                            <input type="button" class="btn btn-info btn-block panel-footer" value="Request Management"></a>
                    </div>
                </div>
            <?php endif;?>   
        </div>
    </div>
</div>