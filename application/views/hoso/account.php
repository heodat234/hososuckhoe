<?php 
if($this->session->has_userdata('user')) {
?>
<html lang="en" class="no-js" id="app" ng-controller="AppCtrl" ios-scale-fix="">
<!-- <![endif]-->

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Disable telephone detection -->
    <meta name="format-detection" content="telephone=no">
    <title>Hồ sơ sức khỏe</title>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/images/logo-hssk1.png">
    
    <!-- Roboto Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>hoso/styles/css/theme.4be66d9b79e3d7e7c00c10dd1395f340.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>hoso/styles/css/theme-blessed1.886a333c167c05b6f76e5a185ce2fdfb.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/blue.css" id="style-switch" />

    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/bootstrap-new/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/js.cookie.js"></script>

    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/ckeditor/ckeditor.js"></script>

    <script src="<?php echo base_url(); ?>public/ssi-modal/js/ssi-modal.min.js"></script>
     <link rel="stylesheet" href="<?php echo base_url(); ?>public/ssi-modal/styles/ssi-modal.css"/> 
</head>

<body>
    <?php echo isset($html_header) ? $html_header : ''; ?>
    <!-- Page -->
    <div id="page" >
        <!--  -->
        <div  id="page-inner" style="min-height: 650px;">
                    <?php echo isset($html_menu) ? $html_menu : ''; ?>
                <div id="main">
                        <?php echo isset($html_body) ? $html_body : ''; ?>
                </div>
        </div>
        
    </div>
    <?php echo isset($html_footer) ? $html_footer : ''; ?>
</body>
<script type="text/javascript" src="<?php echo base_url(); ?>hoso/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>hoso/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/jquery.dataTables.yadcf.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/fixedColumns.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/jquery.dataTables.yadcf.css">
<script type="text/javascript">$('#table').DataTable({
      // colReorder: true,
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [ {
                    className: 'control',
                    orderable: false,
                    targets:   0,
                    responsivePriority: 1,
                } ],
    });
    
  </script>
</html>

<?php 
    }else{redirect(base_url('pageLogin'));}
?>