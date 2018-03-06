<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" class="ihome">
<head>
    <title><?php echo isset($title) ? $title : ''; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="vi" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="<?php echo isset($description) ? $description : ''; ?>"/>
    <meta name="keywords" content="<?php echo isset($keywords) ? $keywords : ''; ?>"/>
    <?php echo isset($meta)?$meta:''; ?><br>
    <link rel="alternate" href="http://hososuckhoe.org/" hreflang="vi-vn" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>public/css/jquery-ui-1.10.3.custom.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>public/css/animate.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>public/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/blue.css" id="style-switch" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/jquery-ui.css" id="style-switch" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/rs-plugin/css/settings.min.css" media="screen" />
    <link href="<?php echo base_url() ?>public/css/my-admin.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/images/logo-hssk1.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/slides.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/inline.min.css" />
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/js.cookie.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=vi"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAbjBhwvVw17A_RP6r_jeQrZ-ChKY90H5U&sensor=false"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112747370-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-112747370-1');
    </script>
</head>
    <body>
        <div id="loader-overlay"><img src="<?php echo base_url() ?>public/images/loader.gif" alt="Loading" /></div>
        <?php echo isset($html_header) ? $html_header : ''; ?>
        <div class="complete-content">  
            <?php echo isset($html_slider) ? $html_slider : ''; ?>
            <?php echo isset($html_body) ? $html_body : ''; ?>                  
        </div>    
        <?php echo isset($html_footer) ? $html_footer : ''; ?>
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
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=1981709738820610';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    </body>
</html>
