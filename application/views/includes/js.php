<script src="<?php echo base_url ('assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url ('assets/js/nicescroll/jquery.nicescroll.min.js');?>"></script>
<script src="<?php echo base_url ('assets/js/moment.min2.js');?>"></script>
<script src="<?php echo base_url ('assets/js/custom.js');?>"></script>
<!-- icheck -->
<script src="<?php echo base_url ('assets/js/icheck/icheck.min.js');?>"></script>
<script src="<?php echo base_url ('assets/js/select/select2.full.js');?>"></script>
<script src="<?php echo base_url ('assets/js/datatables/js/jquery.dataTables.js');?>"></script>
<script src="<?php echo base_url ('assets/js/datatables/tools/js/dataTables.tableTools.js');?>"></script>
<script>
    $(document).ready(function () {
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    $(document).ready(function () {
        var oTable = $('#example').dataTable({
            "oLanguage": {
                "sSearch": "Search all columns:"
            },
            "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [0]
                } //disables sorting for column one
            ],
            'iDisplayLength': 12,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url ('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf');?>"
            }
        });
        $("tfoot input").keyup(function () {
            /* Filter on the column based on the index of this element's parent <th> */
            oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
        });
        $("tfoot input").each(function (i) {
            asInitVals[i] = this.value;
        });
        $("tfoot input").focus(function () {
            if (this.className == "search_init") {
                this.className = "";
                this.value = "";
            }
        });
        $("tfoot input").blur(function (i) {
            if (this.value == "") {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });
    });

    $(document).ready(function () {
        $('#thana_id').change(function () {
            var main_id = $(this).val();
            
            if (main_id !== '')
            {
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: '<?php echo base_url ();?>constitutency/Search/get_ward_id',
                    data: {id: main_id}
                }).done(function (data) {
                    console.log(data);
                    $('#ward_id').html('<option value="">--Select--</option>');
                    $.each(data, function (key, value) {
                        $('#ward_id').append('<option value=' + value.id + '>' + value.english_name + '</option>')
                    });
                });
            }
        });
        $('#ward_id').change(function () {
            var main_id = $(this).val();
            
            if (main_id !== '')
            {
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: '<?php echo base_url ();?>constitutency/Search/get_polling_station_id',
                    data: {id: main_id}
                }).done(function (data) {
                    console.log(data);
                    $('#polling_station_id').html('<option value="">--Select--</option>');
                    $.each(data, function (key, value) {
                        $('#polling_station_id').append('<option value=' + value.id + '>' + value.english_name + '</option>')
                    });
                });
            }
        });
        $('#polling_station_id').change(function () {
            var main_id = $(this).val();
            
            if (main_id !== '')
            {
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: '<?php echo base_url ();?>constitutency/Search/get_booth_id',
                    data: {id: main_id}
                }).done(function (data) {
                    console.log(data);
                    $('#booth_id').html('<option value="">--Select--</option>');
                    $.each(data, function (key, value) {
                        $('#booth_id').append('<option value=' + value.id + '>' + value.english_name + '</option>')
                    });
                });
            }
        });
    });



</script>
