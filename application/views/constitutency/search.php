<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Search</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-6">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Search Records<small>Records</small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php
                            $attributes = ["class" => 'form-verticsl 
                        form-label-left'];
                            echo form_open ('', $attributes);
                            ?>
                            <?php echo $this->session->flashdata ('message');?>
                            <div class="item form-group col-md-4 col-sm-4
                                 col-xs-12">
                                 <?php
                                 $attributes = ['class' => 'control-label',];
                                 echo form_label ('Year 1*', 'year1', $attributes);
                                 ?>
                                <div class="">
                                    <?php
                                    $data       = ['name'        => 'year1',
                                        'id'          => 'year1',
                                        'value'       => set_value ('year1'),
                                        'class'       => 'form-control',
                                        'placeholder' => 'Year',
                                        'required'    => '',];
                                    echo form_input ($data);
                                    ?>
                                </div>
                            </div>
                            <div class="item form-group col-md-4 col-sm-4
                                 col-xs-12">
                                 <?php
                                 $attributes = ['class' => 'control-label',];
                                 echo form_label ('Year2 *', 'year2', $attributes);
                                 ?>

                                <?php
                                $data       = ['name'        => 'year2',
                                    'id'          => 'year2',
                                    'value'       => set_value ('year2'),
                                    'class'       => 'form-control',
                                    'placeholder' => 'Year',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>

                            <div class="item form-group col-md-3 col-sm-3
                                 col-xs-12">
                                 <?php
                                 $attributes = ['class' => 'control-label',];
                                 echo form_label ('Booth ID *', 'booth', $attributes);
                                 ?>

                                <?php
                                $booth_     = [];
                                if (isset ($booth_data) && $booth_data != '')
                                {
                                    if ($booth_data->num_rows () > 0)
                                    {
                                        foreach ($booth_data->result () as $booth_list)
                                        {
                                            $booth_[$booth_list->id] = $booth_list->unique_id;
                                        }
                                    }
                                }
                                $attributes = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom'];
                                echo form_dropdown ('booth_id', $booth_, set_value ('booth_id'), $attributes);
                                ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-4">
                                <?php
                                $data       = ['name'    => 'submit',
                                    'value'   => 'Sign_in',
                                    'type'    => 'submit',
                                    'class'   => 'btn btn-success',
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
            <?php
            if ($listing == 'show')
            {
                ?>
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
                                    <tr class="headings">
                                        <th></th>
                                        <th colspan="7">Year 1</th>
                                        <th colspan="3">Year 2</th>
                                    </tr>
                                    <tr >
                                        <th>Sno.</th>
                                        <th>Booth name </th>
                                        <th>Voter</th>
                                        <th>Voter turn out</th>
                                        <th>Voter turnout male</th>
                                        <th>Voter turnout female</th>
                                        <th>Name of candidates in that particular year</th>
                                        <th>Candidates  votes in that particular year </th>
                                        <th>Booth Name</th>
                                        <th>Voters</th>
                                        <th>Target votes in %</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php $i; ?></td>
                                        <?php
                                        if (isset ($search_candidate_data) && $search_candidate_data != '')
                                        {
                                            if ($search_candidate_data->num_rows () > 0)
                                            {
                                                foreach ($search_candidate_data->result () as $list)
                                                {
                                                    ?>
                                                    <td><?php echo $list->english_name;?></td>
                                                    <td><?php echo $list->total_voter_booth;?></td>
                                                    <td><?php echo $list->voter_turnout;?></td>
                                                    <td><?php echo $list->male_voter_turnout;?></td>
                                                    <td><?php echo $list->female_voter_turnout;?></td>
                                                    <td><?php echo $list->candidate_name;?></td>
                                                    <td><?php echo $list->vote_get;?></td>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>

                                        <?php
                                        if (isset ($search_booth_data) && $search_booth_data != '')
                                        {
                                            if ($search_booth_data->num_rows () > 0)
                                            {
                                                foreach ($search_booth_data->result () as $list)
                                                {
                                                    ?>
                                                    <td><?php  echo $list -> english_name; ?></td>
                                                    <td><?php  echo $list -> total_voter_booth; ?></td>     
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                        

                                        <td><?php // echo $list -> vote_get; ?></td>
                                    </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>
</div>
