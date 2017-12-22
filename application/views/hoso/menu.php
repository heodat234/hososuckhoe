<aside id="sidebar" class="sidebar" data-ng-if="loggedIn" data-ng-class="{'hidden-md hidden-lg' : !loggedIn}" data-ng-controller="SidebarCtrl" data-ng-include="'<?php echo base_url() ?>hoso/app/layout/views/sidebar.html'">
    <div class="sidebar-inner" id="sidebar-inner">
        <div id="user-controller" class="xs-hidden sm-hidden">
            <div class="pic-frame" ng-mouseover="hoverPhoto = true;" ng-mouseleave="hoverPhoto = false; showPhotoMenu = false;">
                <div class="edit-photo-overlay ng-hide" data-ng-show="hoverPhoto &amp;&amp; !isStandardSharedAccess" data-ng-click="showPhotoMenu = true"><a href="" analytics-on="" analytics-event="" analytics-category="Link" analytics-label="/welcome" analytics-value="Edit Photo"><i class="fa fa-pencil edit-photo-pencil"></i>Edit Photo</a></div>
                <ng-switch data-on="photoMenuStep" data-ng-show="showPhotoMenu" role="navigation" class="ng-hide">
                    <!---->
                    <div data-ng-switch-when="1" class="photo-menu">
                        <ul class="nav nav-list">
                            <li><a href="#/profile/account-settings" class="first-element" analytics-on="" analytics-event="#/profile/account-settings" analytics-category="Link" analytics-label="/welcome" analytics-value="Change Photo">Change Photo</a></li>
                            <li><a href="" data-ng-click="nextStep()" analytics-on="" analytics-event="" analytics-category="Link" analytics-label="/welcome" analytics-value="Remove Photo">Remove Photo</a></li>
                            <li><a href="" class="last-element" data-ng-click="$parent.showPhotoMenu = false" analytics-on="" analytics-event="" analytics-category="Link" analytics-label="/welcome" analytics-value="Cancel">Cancel</a></li>
                        </ul>
                    </div>
                    <!---->
                    <!---->
                </ng-switch><img data-ng-src="" data-fallback-src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" alt="avatar">
                <a href="#/profile/about-me" analytics-on="" analytics-event="#/profile/about-me" analytics-category="Link" analytics-label="/welcome" analytics-value="{{currentUser.fullName | titlecase}}">
                    <div id="avatar-name-container" class="visible-spectrum-inline-block avatar-name-overlay-container">
                        <label class="visible-spectrum-inline-block avatar-name-overlay-text">Thanh Hung Le</label>
                    </div>
                </a>
            </div>
            <!---->
            <div data-ng-if="loggedIn">
                <!---->
                <div class="shared-access-list visible-spectrum-block" data-ng-if="loggedIn">
                    <div uib-dropdown="" dropdown-append-to-body="" is-open="vm.sharedAccessVisible" class="dropdown">
                        <button class="btn btn-default dropdown-toggle" uib-dropdown-toggle="" aria-haspopup="true" aria-expanded="false">Change user <span class="caret"></span></button>
                        <!---->
                        <ng-include class="dropdown-body ng-hide" src="'<?php echo base_url() ?>hoso/app/shared-access/directives/share-access-change-user/shared-access-list.html'" data-ng-show="vm.sharedAccessVisible">
                            <div>
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
                                    <li class="user ng-hide" data-ng-click="vm.accessGrantor(loggedInUser.ePersonId)" tabindex="0" data-ng-hide="loggedInUser.ePersonId === currentUser.ePersonId"><img class="profile-image" data-ng-src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" data-fallback-src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" alt="user profile photo"> <span>Thanh Hung Le</span></li>
                                    <li class="hidden-xs hidden-sm user footer" ng-show="!isUserProxied()" if-feature-enabled="sharedAccess"><span><a href="#/share-access" analytics-on="" analytics-event="#/share-access" analytics-category="Link" analytics-label="/welcome" analytics-value=" Request Shared Access"><i class="glyphicon glyphicon-plus hidden-xs"></i> Request Shared Access</a></span></li>
                                </ul>
                            </div>
                        </ng-include>
                        <div class="btn-share-access-wrapper" if-feature-enabled="sharedAccess" data-ng-show="vm.isSharedAccessAvailable()"><a class="btn btn-default btn-share-access" data-ng-href="#/share-access" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="Share Access" href="#/share-access">Share Access</a></div>
                    </div>
                </div>
                <!---->
            </div>
            <!---->
        </div>
        <!---->
        <div id="sidebar-quick-search" data-ng-if="useQuickSearch()">
            <quick-search class="ignore-toggle hidden-md hidden-lg">
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
        <!---->
        <nav id="primary-nav" class="sidebar-nav" role="navigation">
            <ul class="nav nav-list">
                <!---->
                <!---->
           
                <!---->
                <!---->
                <!---->
                <!---->
                <!---->
                <li data-ng-repeat="item in menu" data-ng-if="item.authorized" data-ng-class="{'active': item.active }" class="active">
                    <a id="menu-welcome" data-ng-href="#/welcome" data-ng-click="item.click" data-badge-for="" data-ng-show="loggedIn" data-ng-class="{'active': item.active }" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="  {{item.title}}" href="#/welcome" class="active">
                        <!---->
                        <!---->Welcome
                        <!---->
                    </a>
                    <!---->
                </li>
                <!---->
                <!---->
                <!---->
                <!---->
                <!---->
                <!---->
                <li data-ng-repeat="item in menu" data-ng-if="item.authorized" data-ng-class="{'active': item.active }">
                    <a id="menu-mednow" href="<?php echo base_url() ?>a">
                        <!---->
                        <!---->MedNow Visit
                        <!---->
                    </a>
                    <!---->
                </li>
                <!---->
                <!---->
                <!---->
                <!---->
                <!---->
                <li data-ng-repeat="item in menu" data-ng-if="item.authorized" data-ng-class="{'active': item.active }">
                    <a id="menu-message-center" href="<?php echo base_url() ?>b" class="">
                        <!---->
                        <!----><span class="badge ng-hide" data-ng-if="item.title === 'Message Center'" data-ng-show="alerts.unreadMessages">0</span>
                        <!---->Message Center
                        <!----><span data-ng-if="item.title === 'Message Center'" class="pull-right"><spinner-inline spinner-type="status" trigger="false"><span id="status-spinner" ng-show="showSpinner" class="ng-hide"><img src="<?php echo base_url() ?>hoso/assets/images/update-spinner.gif" alt="Loading spinner"></span></spinner-inline>
                        </span>
                        <!---->
                    </a>
                    <!---->
                    <ul data-ng-if="item.items" class="nav sub-nav hidden-sm hidden-xs" data-ng-class="{'last':$last}">
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                    </ul>
                    <!---->
                </li>
                <!---->
                <!---->
                <!---->
                <!---->
                <!---->
                <li data-ng-repeat="item in menu" data-ng-if="item.authorized" data-ng-class="{'active': item.active }">
                    <a id="menu-learning-resources-" data-ng-href="#/learning-resources/" data-ng-click="item.click" data-badge-for="" data-ng-show="loggedIn" data-ng-class="{'active': item.active }" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="  {{item.title}}" href="#/learning-resources/" class="">
                        <!---->
                        <!---->Learning Resources
                        <!---->
                    </a>
                    <!---->
                    <ul data-ng-if="item.items" class="nav sub-nav hidden-sm hidden-xs" data-ng-class="{'last':$last}">
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                    </ul>
                    <!---->
                </li>
                <!---->
                <!---->
                <!---->
                <li data-ng-repeat="item in menu" data-ng-if="item.authorized" data-ng-class="{'active': item.active }">
                    <a id="menu-notebook" data-ng-href="#/notebook" data-ng-click="item.click" data-badge-for="" data-ng-show="loggedIn" data-ng-class="{'active': item.active }" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="  {{item.title}}" href="#/notebook" class="">
                        <!---->
                        <!---->Notebook
                        <!---->
                    </a>
                    <!---->
                </li>
                <!---->
                <!---->
                <!---->
                <li data-ng-repeat="item in menu" data-ng-if="item.authorized" data-ng-class="{'active': item.active }">
                    <a id="menu-about" data-ng-href="#/about" data-ng-click="item.click" data-badge-for="" data-ng-show="loggedIn" data-ng-class="{'active': item.active }" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="  {{item.title}}" href="#/about" class="">
                        <!---->
                        <!---->About
                        <!---->
                    </a>
                    <!---->
                    <ul data-ng-if="item.items" class="nav sub-nav hidden-sm hidden-xs" data-ng-class="{'last':$last}">
                        <!---->
                        <!---->
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-contactus" data-ng-href="#/about/contactus" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/contactus">Contact Spectrum Health</a></li>
                        <!---->
                        <!---->
                        <!---->
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-partners" data-ng-href="#/about/partners" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/partners">Our Partners</a></li>
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-faq" data-ng-href="#/about/faq" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/faq">FAQ</a></li>
                        <!---->
                        <!---->
                        <!---->
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-terms" data-ng-href="#/about/terms" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/terms">Terms of Use</a></li>
                        <!---->
                        <!---->
                        <!---->
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-privacy" data-ng-href="#/about/privacy" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/privacy">Privacy Policy</a></li>
                        <!---->
                        <!---->
                        <!---->
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-joint-commission" data-ng-href="#/about/joint-commission" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/joint-commission">Joint Commission</a></li>
                        <!---->
                        <!---->
                        <!---->
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-aboutus" data-ng-href="#/about/aboutus" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/aboutus">About Spectrum</a></li>
                        <!---->
                        <!---->
                        <!---->
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-sitemap" data-ng-href="#/about/sitemap" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/sitemap">Sitemap</a></li>
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-information" data-ng-href="#/about/information" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/information">App Information</a></li>
                        <!---->
                        <!---->
                    </ul>
                    <!---->
                </li>
                <!---->
                <!---->
                <!---->
                <!---->
            </ul>
        </nav>
    </div>
</aside>