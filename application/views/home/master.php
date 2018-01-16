<!DOCTYPE HTML>
<!--[if gt IE 8]> <html class="ie9" lang="en"> <![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" class="ihome">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
    <title>Hồ sơ sức khỏe</title>
    <!-- <link REL="SHORTCUT ICON" HREF="favicon.ico"> -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
    
    <link href="<?php echo base_url() ?>public/css/jquery-ui-1.10.3.custom.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>public/css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>public/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/blue.css" id="style-switch" />
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/jquery-ui.css" id="style-switch" />
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/rs-plugin/css/settings.min.css" media="screen" />

    <link href="<?php echo base_url() ?>public/css/my-admin.css" rel="stylesheet" />
    <!-- <link href="<?php echo base_url() ?>public/css/bootstrap.min.css" rel="stylesheet" />    -->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/images/logo-hssk1.png">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/slides.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/inline.min.css" />
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
     <script type="text/javascript" src="<?php echo base_url(); ?>public/js/js.cookie.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAbjBhwvVw17A_RP6r_jeQrZ-ChKY90H5U&sensor=false"></script>
</head>
    <body>
        <div id="loader-overlay"><img src="<?php echo base_url() ?>public/images/loader.gif" alt="Loading" /></div>
        <?php echo isset($html_header) ? $html_header : ''; ?>
        <div class="complete-content">  
            
            <?php echo isset($html_slider) ? $html_slider : ''; ?>
            <?php echo isset($html_body) ? $html_body : ''; ?>                  
        </div>    
        
        <?php echo isset($html_footer) ? $html_footer : ''; ?>
            
       
            
            
        
    <!--JS Inclution-->
    
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery-ui-1.10.3.custom.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>public/bootstrap-new/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.scrollUp.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.sticky.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.flexisel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.imedica.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/custom-imedicajs.min.js"></script>
    <script type='text/javascript'>
        $(window).load(function(){
            $('#loader-overlay').fadeOut(900);
            $("html").css("overflow","visible");
        });
    </script>

    </body>

<!-- Mirrored from imedica-html.brainstormforce.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Dec 2017 08:43:26 GMT -->
</html>
