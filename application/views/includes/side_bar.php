<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title profile_pic"> 
                <?php
                if ($party_data->num_rows () > 0)
                {
                    foreach ($party_data->result () as $party)
                    {
                        ?> 
                        <img src="<?php echo base_url ('uploads/party/' . $party->party_flag);?>" alt="..." class="img-circle" width="46">        
                        <?php
                    }
                }
                ?>

                <span style='font-size:27px;font-wight:bolder; letter-spacing: 3px;   '>EMS</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->

        <!-- /menu profile quick info -->

        <br />
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3> <span>Welcome to EMS</span>

                </h3>
                <hr/>
                <ul class="nav side-menu">
                    <li><a href="<?php echo base_url ('dashboard');?>">
                            <i class="fa fa-home"></i> Dashboard </a>
                    </li>

                    <?php
                    if ($this->session->userdata ('BmsCartAdminUserType') == 'super-admin'):
                        ?>
                        <li><a><i class="fa fa-edit"></i> Admin <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo base_url ('admin/add');?>">Create Admin</a></li>
                                <li><a href="<?php echo base_url ('admin');?>">View Admin</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="<?php echo base_url ('party');?>">
                                <i class="fa fa-list"></i> Party</a>
                        </li>
                        <?php
                    endif;
                    if ($this->session->userdata ('BmsCartAdminUserType') == 'admin' ||
                            $this->session->userdata ('BmsCartAdminUserType') == 'super-admin'):
                        ?>
                        <li><a><i class="fa fa-edit"></i> Manage Constitutency  
                                <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php  echo base_url ('constitutency/search/viewConstitutency');?>">View constitutency</a></li>
                                <li><a href="<?php  echo base_url ('constitutency/search');?>">Search</a></li>
                                <li><a href="<?php echo base_url ('constitutency/thana');?>">Thana</a></li>
                                <li><a href="<?php echo base_url ('constitutency/ward');?>">Ward</a></li>
                                <li><a href="<?php echo base_url ('constitutency/polling_station');?>">
                                        Polling Station</a></li>
                                <li><a href="<?php echo base_url ('constitutency/booth');?>">Booth</a></li>
                                <li><a href="<?php echo base_url ('constitutency/anubagh');?>">Anubagh</a></li>
                                <li><a href="<?php echo base_url ('constitutency/candidate');?>">
                                        Candidate Record</a></li>
                            </ul>
                        </li>

                        <?php
                    endif;
                    if ($this->session->userdata ('BmsCartAdminUserType') == 'sub-admin' ||
                            $this->session->userdata ('BmsCartAdminUserType') == 'super-admin' ||
                            $this->session->userdata ('BmsCartAdminUserType') == 'admin'):
                        ?>
                        <li><a href="<?php echo base_url ('#');?>">
                                <i class="fa fa-list"></i> Manage Volunteer
                                <span class="label label-success pull-right">C S</span>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url ('#');?>">
                                <i class="fa fa-list"></i> Voter List
                                <span class="label label-success pull-right">Coming Soon</span>
                            </a>
                        </li>

                        <?php
                    endif;
                    if ($this->session->userdata ('BmsCartAdminUserType') == 'volunteer' ||
                            $this->session->userdata ('BmsCartAdminUserType') == 'super-admin' ||
                            $this->session->userdata ('BmsCartAdminUserType') == 'admin' ||
                            $this->session->userdata ('BmsCartAdminUserType') == 'sub-admin'):
                        ?>
                        <li><a href="<?php echo base_url ('#');?>">
                                <i class="fa fa-list"></i> Voter Connected
                                <span class="label label-success pull-right">C S</span>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url ('#');?>">
                                <i class="fa fa-list"></i> Task Management
                                <span class="label label-success pull-right">C S</span>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url ('#');?>">
                                <i class="fa fa-list"></i> Reports
                                <span class="label label-success pull-right">Coming Soon</span>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url ('#');?>">
                                <i class="fa fa-list"></i> News Feed
                                <span class="label label-success pull-right">Coming Soon</span>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url ('#');?>">
                                <i class="fa fa-list"></i> Biography
                                <span class="label label-success pull-right">Coming Soon</span>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url ('#');?>">
                                <i class="fa fa-list"></i> Settings
                                <span class="label label-success pull-right">Coming Soon</span>
                            </a>

                        </li>
                        <li><a href="<?php echo base_url ('#');?>">
                                <i class="fa fa-list"></i> Request Management
                                <span class="label label-success pull-right">C S</span>
                            </a>
                        </li>

                    <?php endif;?>   
                </ul>
            </div>

        </div><!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>