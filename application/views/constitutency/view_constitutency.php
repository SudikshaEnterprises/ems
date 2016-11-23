<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Constitutency</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-6">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Manage Constitutency<small>Constitutency</small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php
                            $attributes = ["class" => 'form-horizontal 
                       form-label-left'];
                            echo form_open ('', $attributes);
                            ?>
                            <?php echo $this->session->flashdata ('message');?>
                            <div class="item form-group">
                                <?php
                                $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                                echo form_label ('Select Year *', 'year', $attributes);
                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php
                                    $year       = [];
                                    for ($i = date ('Y'); $i >= 2000; $i --)
                                    {
                                        $year[$i] = $i;
                                    }
                                    $thana_     = '';
                                    $attributes = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom'];
                                    echo form_dropdown ('year', $year, set_value (''), $attributes);
                                    ?>
                                </div>
                            </div>

                            <div class="item form-group">
                                <?php
                                $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                                echo form_label ('Thana ', 'thana', $attributes);
                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php
                                    $thana_[0]  = 'Select thana';
                                    if ($thana->num_rows () > 0)
                                    {
                                        foreach ($thana->result () as $thana_list)
                                        {
                                            $thana_[$thana_list->id] = $thana_list->english_name;
                                        }
                                    }
                                    $attributes = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom', 'id' => 'thana_id'];
                                    echo form_dropdown ('thana_id', $thana_, set_value ('thana_id'), $attributes);
                                    ?>
                                </div>
                            </div>


                            <div class="item form-group">
                                <?php
                                $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                                echo form_label ('Ward ', 'ward', $attributes);
                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php
                                    $ward_      = [];
                                    $attributes = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom', 'id' => 'ward_id'];
                                    echo form_dropdown ('ward_id', $ward_, set_value ('ward_id'), $attributes);
                                    ?>
                                </div>
                            </div>


                            <div class="item form-group">
                                <?php
                                $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                                echo form_label ('Polling station ', 'ward', $attributes);
                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php
                                    $polling_   = '';
                                    $attributes = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom', 'id' => 'polling_station_id'];
                                    echo form_dropdown ('polling_station_id', $polling_, set_value ('polling_station_id'), $attributes);
                                    ?>
                                </div>
                            </div>

                            <div class="item form-group">
                                <?php
                                $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                                echo form_label ('Booth ', 'booth', $attributes);
                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php
                                    $polling_   = '';
                                    $attributes = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom', 'id' => 'booth_id'];
                                    echo form_dropdown ('booth_id', $polling_, set_value ('booth_id'), $attributes);
                                    ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-4">
                                    <?php
                                    $data       = ['name'    => 'submit',
                                        'value'   => 'Sign_in',
                                        'type'    => 'submit',
                                        'class'   => 'btn btn-success pull-right',
                                        'content' => 'Search',];
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
                <?php if ($year_listing == 'show'):?>            
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Search Result</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table id="" class="table table-striped
                                       responsive-utilities table-bordered">
                                    <thead>
                                        <tr >
                                            <th>No of thana's</th>
                                            <th>No of Wards's </th>
                                            <th>No of polling station's</th>
                                            <th>No of booth's</th>
    <!--                                            <th>No of anubagh's</th>-->
                                            <th>State Name</th>
                                            <th>District Name</th>
                                            <th>Zone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $total_thana;?></td>
                                            <td><?php echo $total_ward;?></td>
                                            <td><?php echo $total_polling_station;?></td>
                                            <td><?php echo $total_booth;?></td>
    <!--                                            <td></td>-->
                                            <?php
                                            if ($party_data->num_rows () > 0)
                                            {
                                                foreach ($party_data->result () as $party)
                                                {
                                                    $color = $party->top_bar_color;
                                                    ?>
                                                    <td><?php echo $party->state;?></td>
                                                    <td><?php echo $party->district;?></td>
                                                    <td><?php echo $party->zone;?></td> 
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
                <!-----------thana record-------------->
                <?php if ($thana_listing == 'show'):?>            
                    <div class="col-md-12 col-sm-12 col-xs-12" >
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Search Thana wise</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table id="" class="table table-striped
                                       responsive-utilities table-bordered">
                                    <thead>
                                        <tr >
                                            <th>Sno.</th>
                                            <th>Thana Name(English)</th>
                                            <th>Thana Name(Hindi) </th>
                                            <th>Ward Detail</th>
                                            <th>Total voters</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (isset ($total_thana))
                                        {
                                            if ($total_thana->num_rows () > 0)
                                            {
                                                $i = 1;
                                                foreach ($total_thana->result () as $thana_list)
                                                {
                                                    $thana_total = 0;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++;?></td>
                                                        <td><?php echo $thana_list->english_name;?></td>
                                                        <td><?php echo $thana_list->hindi_name;?></td>

                                                        
                                                        <td>
                                                            <table id="" class="table table-striped
                                                                   responsive-utilities table-bordered">
                                                                <thead>
                                                                    <tr >
                                                                        <th>Ward Name English.</th>
                                                                        <th>Ward hindi Name</th>
                                                                        <th>Total voters</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $where['thana.year'] = $thana_list->year;
                                                                    $where['thana.id']   = $thana_list->id;
                                                                    $total_ward          = $this->common_model->get_ward ($where);
                                                                    if ($total_ward->num_rows () > 0)
                                                                    {
                                                                        $i = 1;
                                                                        foreach ($total_ward->result () as $ward_list)
                                                                        {
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $ward_list->english_name;?> </td>
                                                                                <td><?php echo $ward_list->english_name;?> </td>
                                                                                <td>
                                                                                    <?php
                                                                                    $where['ward.year'] = $thana_list->year;
                                                                                    $where['ward.id']   = $ward_list->id;
                                                                                    $booth_voters       = $this->common_model->get_booth ($where);
                                                                                    $booth=0;;
                                                                                    if ($booth_voters->num_rows () > 0)
                                                                                    {
                                                                                        foreach ($booth_voters->result () as $booth_list)
                                                                                        {
                                                                                             $booth+=$booth_list->total_voter_booth . '<br>';
                                                                                        }
                                                                                    }
                                                                                    echo $booth;
                                                                                    $thana_total+=$booth;
                                                                                    ?>
                                                                                </td>
                                                                            </tr>  <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                    </td>


                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td><?php echo $thana_total;?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <div class="clearfix clear"></div>

                            </div>
                        </div>
                    </div>
                    <?php
                endif;
                ?>

            </div>
        </div>
    </div>
</div>
