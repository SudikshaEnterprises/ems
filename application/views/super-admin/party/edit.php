<?php $party      = $party_data -> row (); ?>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("elements", "1", {
                packages: "transliteration"
            });
            function onLoad() {
                var options = {
                    sourceLanguage:
                            google.elements.transliteration.LanguageCode.ENGLISH,
                    destinationLanguage:
                            [google.elements.transliteration.LanguageCode.HINDI],
                    shortcutKey: 'ctrl+g',
                    transliterationEnabled: true
                };

                var control = new google.elements.transliteration.TransliterationControl(options);

                // Enable transliteration in the editable elements with id
                // 'transliterateDiv'.
                control.makeTransliteratable(['transliterateDiv']);
                control.makeTransliteratable(['transliterateDiv2']);
            }
            google.setOnLoadCallback(onLoad);
        </script>
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
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Short name *', 'short_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $attributes = ['name'  => 'short_name', 
                                    'class' => 'form-control',
                                    'value' => set_value ('short_name', $party -> short_name)];
                                echo form_input ($attributes);
                                ?>
                            </div>
                        </div> 
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Name English *', 'first_name', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'english_name',
                                    'id'          => 'english_name',
                                    'value'       => set_value ('english_name', $party -> english_name),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'English Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <?php
                            
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Name Hindi *', 'hindi_name', $attributes);
                            ?>
                            <span>Press Space after every word</span>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'hindi_name',
                                    'id'          => 'transliterateDiv',
                                    'value'       => set_value ('hindi_name', $party -> hindi_name),
                                    'class'       => 'form-control col-md-7 col-xs-12 hindifont',
                                    'placeholder' => 'Hindi Name',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Slogan *', 'slogan', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'slogan',
                                    'id'          => 'slogan',
                                    'value'       => set_value ('slogan', $party -> slogan),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'Slogan',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 
                        <!-- colorpicker -->
                        <link href="<?php echo base_url ('assets/'); ?>/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Color *', 'slogan', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'color',
                                    'id'          => 'color',
                                    'value'       => set_value ('color', $party -> color),
                                    'class'       => 'demo1 form-control',
                                    'placeholder' => 'Color',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Top Bar Color *', 'slogan', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'top_bar_color',
                                    'id'          => 'top_bar_color',
                                    'value'       => set_value ('top_bar_color', $party -> top_bar_color),
                                    'class'       => 'demo1 form-control col-md-7 col-xs-12',
                                    'placeholder' => 'top_bar_color',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="<?php echo base_url ('uploads/party/' . $party -> leader_1); ?>" width="40">
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Leader 1 Picture', 'leader_1', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'      => 'leader_1',
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
                            <div class="col-md-3 col-sm-3 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="<?php echo base_url ('uploads/party/' . $party -> leader_2); ?>" width="40">
                            </div>
                        </div>
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Leader 2 Picture', 'leader_2', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'      => 'leader_2',
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
                            <div class="col-md-3 col-sm-3 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="<?php echo base_url ('uploads/party/' . $party -> leader_3); ?>" width="40">
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Leader 3 Picture', 'leader_3', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'      => 'leader_3',
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
                            <div class="col-md-3 col-sm-3 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="<?php echo base_url ('uploads/party/' . $party -> vote_sign); ?>" width="40">
                            </div>
                        </div>

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Vote Sign', 'vote_sign', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'      => 'vote_sign',
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
                            <div class="col-md-3 col-sm-3 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="<?php echo base_url ('uploads/party/' . $party -> party_flag); ?>" width="40">
                            </div>
                        </div>                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Party Flag', 'party_flag', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'      => 'party_flag',
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
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('State Name *', 'state', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'state',
                                    'id'          => 'state',
                                    'value'       => set_value ('state', $party -> state),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'state',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('District Name *', 'district', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'district',
                                    'id'          => 'district',
                                    'value'       => set_value ('district', $party -> district),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'district',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Zone Name *', 'zone', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $data       = ['name'        => 'zone',
                                    'id'          => 'zone',
                                    'value'       => set_value ('zone', $party -> zone),
                                    'class'       => 'form-control col-md-7 col-xs-12',
                                    'placeholder' => 'zone',
                                    'required'    => '',];
                                echo form_input ($data);
                                ?>
                            </div>
                        </div> 
                        <div class="item form-group">
                            <?php
                            $attributes = ['class' => 'control-label col-md-3 col-sm-3 col-xs-12',];
                            echo form_label ('Status', 'status', $attributes);
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $status     = ["1" => "Active", "2" => "Deactive"];
                                $attributes = ['class' => 'form-control', 'data-style' => 'btn-primary btn-custom'];
                                echo form_dropdown ('status', $status, set_value ('status', $party -> status), $attributes);
                                ?>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <?php
                                $data       = ['name'    => 'submit',
                                    'value'   => 'Add Party',
                                    'type'    => 'submit',
                                    'class'   => 'btn btn-success',
                                    'content' => 'Update Party',];
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
 <!-- color picker -->
    <script src="<?php echo base_url ('assets/'); ?>/js/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="<?php echo base_url ('assets/'); ?>/js/colorpicker/docs.js"></script>