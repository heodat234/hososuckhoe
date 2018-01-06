<aside id="sidebar" class="sidebar" >
    <div class="sidebar-inner" id="sidebar-inner">
        <div id="user-controller" class="xs-hidden sm-hidden">
            <div class="pic-frame" >
                <div class="edit-photo-overlay ng-hide" ><a href="" ><i class="fa fa-pencil edit-photo-pencil"></i>Edit Photo</a></div>
                <img  src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png" alt="avatar">
                <a href="#/profile/about-me">
                    <div id="avatar-name-container" class="visible-spectrum-inline-block avatar-name-overlay-container">
                        <label class="visible-spectrum-inline-block avatar-name-overlay-text"><?php echo $this->session->userdata('user')['name']  ?></label>
                    </div>
                </a>
            </div>
           
        </div>
        <!---->
        <div id="sidebar-quick-search" data-ng-if="useQuickSearch()">
            <quick-search class="ignore-toggle hidden-md hidden-lg">
                <form id="quick-search" class="ng-pristine ng-valid ng-valid-maxlength">
                    <div class="search-input"><span class="search-icon"><i class="icon-search"></i></span>
                        <label for="search" style="position:absolute;clip:rect(1px,1px,1px,1px)">I am looking for...</label>
                        <input id="search" type="search" data-ng-model="search" placeholder="I am looking for..." maxlength="40" class="ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength">
                    </div>
                </form>
               
            </quick-search>
        </div>
        <!---->
        <nav id="primary-nav" class="sidebar-nav" role="navigation">
            <ul class="nav nav-list">
                <!---->
                <!---->
           
                <!---->
                    <li data-ng-repeat="item in menu" class="<?php echo isset($welcome)?$welcome : '' ?>">
                        <a id="menu-welcome"  href="<?php echo base_url() ?>account.html" class="<?php echo isset($welcome)?$welcome : '' ?>">
                            <!---->Thông tin cơ bản
                        </a>
                    </li>
                <!---->
                <!---->
                <!---->
                <!---->
                <!---->
                    <?php if($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '1') { ?>
                        <li data-ng-repeat="item in menu" class="<?php echo isset($a)?$a : '' ?>">
                            <a id="menu-mednow" href="<?php echo base_url() ?>hoso.html" class="<?php echo isset($a)?$a : '' ?>">Hồ sơ</a>
                        </li>
                    <?php }else if ($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '0') { ?>
                        <li data-ng-repeat="item in menu" class="<?php echo isset($a)?$a : '' ?>">
                            <a id="menu-mednow" href="<?php echo base_url() ?>admin.html" class="<?php echo isset($a)?$a : '' ?>">Thông báo</a>
                        </li>
                    <?php  } ?>
                    
                    
                <!---->
                <!---->
                    <?php if ($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '0') { ?>
                        <li class="<?php echo isset($nhaplieu)?$nhaplieu : '' ?>">
                            <a id="menu-mednow" href="<?php echo base_url() ?>chisoAdmin.html" class="<?php echo isset($nhaplieu)?$nhaplieu : '' ?>">Nhập liệu</a>
                        </li>
                    <?php  } ?>
                <!---->
                <!---->
                    <?php if ($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '1') { ?>
                    <li class="<?php echo isset($tk)?$tk : '' ?>">
                        <a id="menu-message-center" href="<?php echo base_url() ?>thongke.html" class="<?php echo isset($tk)?$tk : '' ?>">
                            <span class="badge ng-hide">0</span>
                            Trang tổng quan
                        </a>
                    </li>
                    <?php } ?>
                <!---->
                <!---->
                <!---->
                <!---->
                <!---->
                <!-- <li >
                    <a id="menu-learning-resources-" class="">
                        Learning Resources
                    </a>
                    
                    <ul  class="nav sub-nav hidden-sm hidden-xs" >
                        
                    </ul>
                </li> -->
                <!---->
                <!---->
                <!---->
                <!-- <li data-ng-repeat="item in menu" data-ng-if="item.authorized" data-ng-class="{'active': item.active }">
                    <a id="menu-notebook" data-ng-href="#/notebook" data-ng-click="item.click" data-badge-for="" data-ng-show="loggedIn" data-ng-class="{'active': item.active }" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="  {{item.title}}" href="#/notebook" class="">
                        
                        Notebook
                        
                    </a>
                    
                </li> -->
                <!---->
                <!---->
                <!---->
                <!-- <li data-ng-repeat="item in menu" data-ng-if="item.authorized" data-ng-class="{'active': item.active }">
                    <a id="menu-about" data-ng-href="#/about" data-ng-click="item.click" data-badge-for="" data-ng-show="loggedIn" data-ng-class="{'active': item.active }" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="  {{item.title}}" href="#/about" class="">
                        
                        About
                        
                    </a>
                    
                    <ul data-ng-if="item.items" class="nav sub-nav hidden-sm hidden-xs" data-ng-class="{'last':$last}">
                        
                        
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-contactus" data-ng-href="#/about/contactus" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/contactus">Contact Spectrum Health</a></li>
                        
                        
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-partners" data-ng-href="#/about/partners" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/partners">Our Partners</a></li>
                       
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-faq" data-ng-href="#/about/faq" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/faq">FAQ</a></li>
                       
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-terms" data-ng-href="#/about/terms" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/terms">Terms of Use</a></li>
                       
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-privacy" data-ng-href="#/about/privacy" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/privacy">Privacy Policy</a></li>
                        
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-joint-commission" data-ng-href="#/about/joint-commission" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/joint-commission">Joint Commission</a></li>
                       
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-aboutus" data-ng-href="#/about/aboutus" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/aboutus">About Spectrum</a></li>
                        
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-sitemap" data-ng-href="#/about/sitemap" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/sitemap">Sitemap</a></li>
                        
                        <li data-ng-repeat="subitem in item.items" data-ng-if="subitem.authorized" data-ng-class="{'active': subitem.active }"><a id="submenu-about-information" data-ng-href="#/about/information" data-ng-click="subitem.click" data-badge-for="" analytics-on="" analytics-category="Link" analytics-label="/welcome" analytics-value="{{subitem.title}}" href="#/about/information">App Information</a></li>
                        
                    </ul>
                   
                </li> -->
               
            </ul>
        </nav>
    </div>
</aside>