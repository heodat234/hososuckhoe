<header id="header" class="header-bar" data-ng-include="'<?php echo base_url() ?>hoso/app/layout/views/header.html'">
        <div class="clearfix header">
            <!---->
            <div data-ng-if="brand === 'sh'">
                <div class="hidden-md hidden-lg" data-ng-controller="TutorialCtrl" data-ng-show="loggedIn &amp;&amp; !getHasSeenTutorial()" data-ng-click="tutorialClicked($event)">
                    <div id="tutorial-overlay"></div>
                    <div id="tutorial-container">
                        <div id="tutorial">
                            <div class="owl-carousel owl-loaded" data-tutorial="tutorialItems">
                                <!---->
                                <!---->
                                <!---->
                                <div class="owl-stage-outer">
                                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: 0s;">
                                        <div class="owl-item">
                                            <div class="" data-ng-repeat="item in tutorialItems">
                                                <div class="row">
                                                    <div class="col-xs-2">
                                                        <!----><img id="tutorial-hamburger" data-ng-if="$index === 0" class="tutorial-feature-image" data-ng-src="<?php echo base_url() ?>hoso/assets/images/coach-mark_hamburger_r1v1.svg" alt="Menu icon" src="<?php echo base_url() ?>hoso/assets/images/coach-mark_hamburger_r1v1.svg">
                                                        <!---->
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="row">
                                                            <!---->
                                                            <div data-ng-if="$index === 0">
                                                                <div class="tutorial-arrow-image"><img data-ng-src="<?php echo base_url() ?>hoso/assets/images/coach-mark_left-arrow.svg" alt="Arrow icon" src="<?php echo base_url() ?>hoso/assets/images/coach-mark_left-arrow.svg"></div>
                                                            </div>
                                                            <!---->
                                                            <!---->
                                                        </div>
                                                        <div class="row">
                                                            <div class="text-center">
                                                                <div class="tutorial-content">
                                                                    <h3 class="item">More Features</h3>
                                                                    <p>Tap this icon to see all of the features available to you.</p>
                                                                    <p class="tutorial-hint">Tap anywhere to continue</p><img class="tutorial-nav-icon" data-ng-src="<?php echo base_url() ?>hoso/assets/images/coach-mark_step1_r1v1.svg" alt="Navigation icon" src="<?php echo base_url() ?>hoso/assets/images/coach-mark_step1_r1v1.svg"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item">
                                            <div class="" data-ng-repeat="item in tutorialItems">
                                                <div class="row">
                                                    <div class="col-xs-2">
                                                        <!---->
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="row">
                                                            <!---->
                                                            <!---->
                                                            <div data-ng-if="$index === 1">
                                                                <div class="tutorial-arrow-image"><img class="align-right" data-ng-src="<?php echo base_url() ?>hoso/assets/images/coach-mark_right-arrow.svg" alt="Arrow icon" src="<?php echo base_url() ?>hoso/assets/images/coach-mark_right-arrow.svg"></div>
                                                            </div>
                                                            <!---->
                                                        </div>
                                                        <div class="row">
                                                            <div class="text-center">
                                                                <div class="tutorial-content">
                                                                    <h3 class="item">Profile</h3>
                                                                    <p>Tap here to view account activity or sign out.</p>
                                                                    <p class="tutorial-hint">Tap anywhere to dismiss</p><img class="tutorial-nav-icon" data-ng-src="<?php echo base_url() ?>hoso/assets/images/coach-mark_step2_r1v1.svg" alt="Navigation icon" src="<?php echo base_url() ?>hoso/assets/images/coach-mark_step2_r1v1.svg"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!----><img id="tutorial-avatar" data-ng-if="$index === 1" class="tutorial-feature-image" data-ng-src="<?php echo base_url() ?>hoso/assets/images/coach-mark_profile-name_r1v1.svg" alt="Profile icon" src="<?php echo base_url() ?>hoso/assets/images/coach-mark_profile-name_r1v1.svg">
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-nav disabled">
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="owl-dots disabled"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <button type="button" class="sidebar-toggle btn-menu-toggle hidden-lg hide-element" data-ng-class="{'hidden': !loggedIn}" data-sidebar-toggle="right"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <span class="profile-toggle nav nav-list hidden-md hidden-lg hide-element" data-ng-show="loggedIn"><a id="profile-link" class="img-link avatar" data-sidebar-toggle="left" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{currentUser.displayName | titlecase}} "><div class="header-profile-image-wrapper pull-right"><img class="profile-image" data-ng-src="" data-fallback-src="assets/images/profile-fallback.png" src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" alt="Profile photo"></div><small>Thanh Hung <b class="caret"></b></small></a></span>
            <ul class="nav hidden-sm hidden-xs" data-ng-show="loggedIn">
                <!---->
                <li class="visible-spectrum-block" data-ng-if="useQuickSearch()">
                    <div id="header-quick-search">
                        <quick-search class="ignore-toggle">
                            <form id="quick-search" class="ng-pristine ng-valid ng-valid-maxlength">
                                <div class="search-input" data-ng-class="{'search-results': searchItems.length}"><span class="search-icon"><i class="icon-search"></i></span>
                                    <label for="search" style="position:absolute;clip:rect(1px,1px,1px,1px)">I am looking for...</label>
                                    <input id="search" type="search" data-ng-model="search" placeholder="I am looking for..." maxlength="40" class="ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength">
                                </div>
                            </form>
                            <nav data-ng-show="search.length" id="search-results" class="ng-hide">
                                <ul>
                                    <!---->
                                    <!---->
                                    <!---->
                                </ul>
                            </nav>
                        </quick-search>
                    </div>
                </li>
                <!---->
                <!---->
                <li class="visible-spectrum-block">
                    <div class="header-profile-image-wrapper"><img class="profile-image" data-ng-src="" data-fallback-src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" alt="Profile photo" src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png"></div>
                </li>
                <li class="visible-spectrum-block"><span class="header-text">Thanh Hung Le</span></li>
                <li class="visible-spectrum-block"><a href="" data-ng-click="signOut()" analytics-on="" analytics-event="" analytics-category="Link" analytics-label="/welcome" analytics-value="Sign Out">Sign Out</a></li>
                <!---->
                <li if-feature-enabled="messages" data-ng-if="loggedIn" class="visible-spectrum-block"><a href="#/message-center/inbox" analytics-on="" analytics-event="#/message-center/inbox" analytics-category="Link" analytics-label="/welcome" analytics-value=" {{ alerts.unreadMessages }}"><i class="glyphicon glyphicon-envelope"></i> <span class="badge envelope ng-hide" ng-show="alerts.unreadMessages" ui-if="item.url == 'messages'">0</span></a></li>
                <!---->
                <li class="dropdown profile-link"><a class="clickable" data-toggle="dropdown" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value=" {{currentUser.displayName | titlecase}}  "><span class="visible-priority-block"><img class="profile-image" data-ng-src="" data-fallback-src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" alt="Profile photo" src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png"> <span class="header-text">Thanh Hung</span> <b class="caret"></b></span> <span class="visible-spectrum-block"><i class="glyphicon glyphicon-cog"><b class="caret"></b></i></span></a>
                    <!---->
                    <aside id="settings-menu" class="sidebar dropdown-menu dropdown-menu-right" data-ng-include="'<?php echo base_url() ?>hoso/app/layout/views/right-sidebar.html'" role="menu">
                        <nav class="sidebar-nav" role="navigation">
                            <!---->
                            <div data-list-only="true" data-is-in-menu="true" class="hidden-md hidden-lg shared-access-list visible-spectrum-block" data-ng-if="loggedIn">
                                <ul>
                                    <li class="visible-spectrum-block header"><span>Using MyHealth as:</span></li>
                                    <li class="user user-current"><img class="profile-image" data-ng-src="" data-fallback-src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png"> <span>Thanh Hung Le</span></li>
                                    <!---->
                                    <!---->
                                    <li data-ng-if="!vm.hasGrantors()">
                                        <!---->You are not sharing with anyone yet.</li>
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                    <li class="user ng-hide" data-ng-click="vm.accessGrantor(loggedInUser.ePersonId)" tabindex="0" data-ng-hide="loggedInUser.ePersonId === currentUser.ePersonId"><img class="profile-image" data-ng-src="assets/images/profile-fallback.png" data-fallback-src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" alt="user profile photo"> <span>Thanh Hung Le</span></li>
                                    <li class="hidden-xs hidden-sm user footer" ng-show="!isUserProxied()" if-feature-enabled="sharedAccess"><span><a href="#/share-access" analytics-on="" analytics-event="#/share-access" analytics-category="Link" analytics-label="/welcome" analytics-value=" Request Shared Access"><i class="glyphicon glyphicon-plus hidden-xs"></i> Request Shared Access</a></span></li>
                                </ul>
                            </div>
                            <!---->
                            <!---->
                            <ng-include src="'<?php echo base_url() ?>hoso/app/layout/views/shared-access-link.html'">
                                <div data-ng-controller="RightSidebarCtrl">
                                    <!----><a role="menuitem" href="#/share-access" data-ng-if="showSharedAccessLink()" analytics-on="" analytics-event="#/share-access" analytics-category="Link" analytics-label="/welcome" analytics-value="Share Access">Share Access</a>
                                    <!---->
                                </div>
                            </ng-include>
                            <!----><a role="menuitem" href="#/profile/about-me" class="hidden-sm hidden-xs" analytics-on="" analytics-event="#/profile/about-me" analytics-category="Link" analytics-label="/welcome" analytics-value="Profile">Profile</a> <a role="menuitem" href="#/profile" class="hidden-md hidden-lg" analytics-on="" analytics-event="#/profile" analytics-category="Link" analytics-label="/welcome" analytics-value="Profile">Profile</a> <a role="menuitem" href="#/accountActivity" data-ng-hide="isStandardSharedAccess" analytics-on="" analytics-event="#/accountActivity" analytics-category="Link" analytics-label="/welcome" analytics-value="Account Activity" class="">Account Activity</a>
                            <!---->
                            <!---->
                            <!----><a role="menuitem" href="" data-ng-click="signOut()" analytics-on="" analytics-event="" analytics-category="Link" analytics-label="/welcome" analytics-value="Sign Out">Sign Out</a></nav>
                    </aside>
                </li>
            </ul><a data-ng-href="#/welcome" title="My Health" id="logo" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="" href="#/welcome"></a></div>
    </header>

    