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
    <title data-ng-bind="'MyHealth - ' + $root.title">MyHealth - Welcome</title>
    <!-- icons -->
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>hoso/assets/images/spectrum/icons/favicon.png">
    <link rel="icon" href="<?php echo base_url() ?>hoso/assets/images/spectrum/icons/favicon.png">
    <!--[if IE]><link rel="shortcut icon" href="assets/images/spectrum/icons/favicon.png"><![endif]-->
    <!-- or, set /favicon.ico for IE10 win -->
    <!-- win8+ -->
    <meta name="msapplication-TileColor" content="#D83434">
    <meta name="msapplication-TileImage" content="<?php echo base_url() ?>hoso/assets/images/spectrum/icons/favicon.png">
    <!-- apple -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>hoso/assets/images/spectrum/icons/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>hoso/assets/images/spectrum/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url() ?>hoso/assets/images/spectrum/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url() ?>hoso/assets/images/spectrum/icons/favicon.png">
    <!-- Roboto Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>hoso/styles/css/vendor.5f80341f5fe575afd474b2f5d1b8ecb4.css">
    <!-- Responsive web and mobile web use a proxy to redirect to the appropriate Priority/Spectrum theme. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>hoso/styles/css/theme.4be66d9b79e3d7e7c00c10dd1395f340.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>hoso/styles/css/my-style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/blue.css" id="style-switch" />

    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/bootstrap-new/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <script async="" src="https://cdn.appdynamics.com/adrum-ext.20eb25d52848d8f807fb234561b4fac7.js"></script>
    
    <!-- End Google Tag Manager -->
    <style type="text/css"></style>
    <script type="text/javascript" src="https://c.la1-c2cs-phx.salesforceliveagent.com/content/g/js/40.0/deployment.js" async=""></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/js.cookie.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>hoso/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>hoso/js/dataTables.bootstrap.min.js"></script>

     <script src="https://code.highcharts.com/highcharts.src.js"></script>
</head>

<body data-ng-class="{'splash' : !loggedIn, 'ph-app': usePhTheme()}">
    
    
    <?php echo isset($html_header) ? $html_header : ''; ?>
    <!-- Sales Force: LiveAgent -->
    <sales-force-script url="https://c.la1-c2cs-phx.salesforceliveagent.com/content/g/js/40.0/deployment.js"></sales-force-script>
    <!-- Page -->
    <div id="page">
        <div id="page-shade"></div>
        <span></span>
        <span class="fixed-center"></span>
        <div id="page-overlay" class="us-spinner-backdrop"></div>
        <div id="page-inner" style="min-height: 753px;">
            <!-- Sidebar -->
            <!---->
            <!---->
            <?php echo isset($html_menu) ? $html_menu : ''; ?>
           
            <!---->
            <!-- Main -->
            <div id="main">
                <!--Banner for e-person-->
                <!---->
                <div id="eperson-banner" class="hidden-xs">
                    <!---->
                    <ng-include src="'<?php echo base_url() ?>hoso/app/layout/views/eperson-banner.html'">
                        <section class="eperson-banner-container hidden-xs">
                            <div class="col-lg-3 col-md-3 col-sm-3 eperson-all-features-icon-container"><img class="eperson-all-features-icon" src="<?php echo base_url() ?>hoso/assets/images/lobby_all-features.png" alt="all features icon"></div>
                            <div class="col-lg-9 col-md-9 col-sm-9 eperson-all-features-text-container">
                                <h1 class="eperson-all-features-title">Get All The Features</h1>
                                <p class="eperson-all-features-text">Make appointments, view lab results, pay your bills online, review prescriptions, sync and share your medical records, and keep track of it all with your Health Timeline. Click "Show My Data" on the <a data-ng-href="#/lobby" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="Welcome Page" href="#/lobby" analytics-event="#/lobby">Welcome Page</a>.</p>
                            </div>
                        </section>
                    </ng-include>
                </div>
                <!---->
                <!---->
                <!-- Nav -->
                <!---->
                <div data-ng-controller="QuickLinksCtrl" data-ng-if="loggedIn" ng-show="showQuickLinksMenu()" data-ng-class="{'hidden-xs': !showCarousel}" class="ng-hide hidden-xs">
                    <div id="quick-links">
                        <nav class="" role="navigation">
                            <div class="header-text ng-hide" ng-show="isTrayOpened">Drag and drop to customize the order of your feature tiles.
                            </div>
                            <quick-links menu="menu" has-new-items="menuHasNewItems()" is-tray-opened="isTrayOpened" is-menu-visible="showQuickLinksMenu()">
                                <ul id="tile-carousel" class="owl-carousel owl-carousel-loading invisible" ng-class="{'owl-carousel-loading': carouselIsLoading(), invisible: !directiveInitialized}" dnd-class-for-placeholder="dnd-placeholder" dnd-class-for-dragover="dnd-dragover" dnd-list="menu" dnd-horizontal-list="true" dnd-drop="itemDropped(index, item)">
                                    <!---->
                                </ul>
                                <!---->
                            </quick-links>
                            <a ng-show="isTrayOpened &amp;&amp; !menuHasNewItems() &amp;&amp; !resetTilesAreYouSure" ng-click="resetQuickLinksOrderInitialClick()" class="reset-order-link ng-hide" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="Reset To Default Order">Reset To Default Order</a>
                            <div class="reset-order-are-you-sure reset-order-link ng-hide" ng-show="isTrayOpened &amp;&amp; resetTilesAreYouSure">
                                Are you sure?
                                <a ng-click="resetQuickLinksOrder()" class="reset-order-yup-im-sure" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="Yes. Reset to default.">Yes. Reset to default.</a>
                                <a ng-click="resetQuickLinksNope()" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="No. Keep my order.">No. Keep my order.</a>
                            </div>
                        </nav>
                    </div>
                    <div id="carousel-tray-tab" ng-click="toggleOpenTray()" if-feature-enabled="openCarouselTray" ng-mouseover="hovered = true;" ng-mouseout="hovered = false;" ng-show="showShowCustomizeButton()" class="ng-hide">
                        <div id="tray-tab-overlay">
                            <span class="unselectable ng-hide" ng-show="hovered &amp;&amp; !isTrayOpened &amp;&amp; !menuHasNewItems() &amp;&amp; !isMobile">Customize</span>
                            <span class="unselectable ng-hide" ng-show="isTrayOpened">Close</span>
                            <span id="new-features-available-message" class="unselectable ng-hide" ng-show="!isTrayOpened &amp;&amp; menuHasNewItems()">New Features Available!</span>
                        </div>
                        <i ng-show="!isTrayOpened" class="fa fa-angle-down fa-lg desktop-arrow-down" ng-class="{'bounce': menuHasNewItems(), 'desktop-arrow-down': !isMobile}"></i>
                        <i ng-show="isTrayOpened" class="fa fa-angle-up fa-lg ng-hide"></i>
                    </div>
                </div>
                <!---->
                <!-- Notifications -->
                <div id="notifications" data-notification-list="">
                    <!---->
                </div>
                
                <!-- Content -->
                <main id="content">
                    <!---->
                    <?php echo isset($html_body) ? $html_body : ''; ?>
                </main>
            </div>
        </div>
    </div>
    <!-- Footer -->
            <?php echo isset($html_footer) ? $html_footer : ''; ?>
    <!---->
    
    
</body>

</html>
<?php 
    }else{redirect(base_url('pageLogin'));}
?>