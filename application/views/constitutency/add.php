<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Constitutency</h3>
            </div>


        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Constitutency <small>Add</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <!-- Smart Wizard -->

                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            Thana
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Ward
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Polling Station
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4">
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            Booth
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-5">
                                        <span class="step_no">5</span>
                                        <span class="step_descr">
                                            Anubagh
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="step-1" class="col-md-12 col-sm-12 col-xs-12">
                                <h2 class="StepTitle">Step 1: Thana</h2>

                                <?php $this->load->view ('constitutency/thana/add')?>
                            </div>
                            <div id="step-2">
                                <h2 class="StepTitle">Step 2: Ward</h2>
                                <?php $this->load->view ('constitutency/ward/add')?>
                            </div>
                            <div id="step-3">
                                <h2 class="StepTitle">Step 3: Polling Station</h2>
                               <?php $this->load->view ('constitutency/polling_station/add')?>
                            </div>
                            <div id="step-4">
                                <h2 class="StepTitle">Step 4: Booth</h2>
                                <?php $this->load->view ('constitutency/booth/add')?>
                            </div>
                            <div id="step-5">
                                <h2 class="StepTitle">Step 5: Anubagh</h2>
                                <?php $this->load->view ('constitutency/anubagh/add')?>
                            </div>


                        </div>
                        <!-- End SmartWizard Content -->







                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->



<!-- jQuery -->
<script src="<?php echo base_url ('vendors/jquery/dist/jquery.min.js');?>"></script>

<!-- FastClick -->
<script src="<?php echo base_url ('vendors/fastclick/lib/fastclick.js');?>"></script>
<!-- jQuery Smart Wizard -->
<script src="<?php echo base_url ('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js');?>"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url ('build/js/custom.min.js');?>"></script>

<!-- jQuery Smart Wizard -->
<script>
    $(document).ready(function () {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
            transitionEffect: 'slide'
        });
        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
    });
</script>
<!-- /jQuery Smart Wizard -->
</body>
</html>