<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EMS</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url ('vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url ('vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url ('vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url ('vendors/animate.css/animate.min.css');?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url ('build/css/custom.min.css');?>" rel="stylesheet">
     <link href="<?php echo base_url ('assets/css/datatables/tools/css/dataTables.tableTools.css');?>" rel="stylesheet">

    <script src="<?php echo base_url ('assets/js/jquery.min.js');?>"></script>

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
</head>