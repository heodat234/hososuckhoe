<header id="header" class="header-bar">
    <div class=" header" style="border-bottom: 1px solid #ededee;">
        
        <ul class="nav hidden-sm hidden-xs" style="margin-right: 5%">
            <!---->
            <li class="visible-spectrum-block">
                <div id="header-quick-search">
                    <!-- <quick-search class="ignore-toggle">
                        <form id="quick-search" class="ng-pristine ng-valid ng-valid-maxlength">
                            <div class="search-input">
                                <span class="search-icon"><i class="icon-search"></i></span>
                                <label for="search" style="position:absolute;clip:rect(1px,1px,1px,1px)">I am looking for...</label>
                                <input id="search" type="search" placeholder="I am looking for..." maxlength="40" class="ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength">
                            </div>
                        </form>
                        <nav id="search-results" class="ng-hide">
                            <ul>
                        
                            </ul>
                        </nav>
                    </quick-search> -->
                </div>
            </li>
            <!---->
            <li class="visible-spectrum-block">
                <div class="header-profile-image-wrapper">
                    <img class="profile-image" src="<?php echo base_url() ?>hoso/assets/images/profile-fallback.png">
                </div>
            </li>
            <li class="visible-spectrum-block"><span class="header-text"><?php echo $this->session->userdata('user')['name']  ?></span></li>
            <li class="visible-spectrum-block">
                <a style="margin-top: 5px;" href="<?php echo base_url()?>logout">Đăng xuất</a>
            </li>
            
            
           
        </ul>
    </div>
    <div id="headerstic">
        <div class=" header">
            <div class=" top-bar container">
                <!-- <div class="row"> -->
                    <nav class="navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="<?php echo base_url() ?>"><div class="logo"></div></a>
                            </div>
                            
                            <div class="collapse navbar-collapse right" >
                                <ul class="nav navbar-nav navbar-right" style="margin-top: -4px; margin-left: 200px;" >
                                    <li class="<?php echo isset($trangchu)? $trangchu : '' ?>"><a href="<?php echo base_url() ?>" ><i class="icon-home"></i>Trang chủ</a>
                                    </li>

                                    <li class=" <?php echo isset($benhsu)? $benhsu : '' ?>"><a href="<?php echo base_url() ?>benhsu.html " class=" <?php echo isset($benhsu)? $benhsu : '' ?>" ><i class="icon-cog"></i>Bệnh sử</a>
                                        
                                    </li>
                                    
                                    <li class=" <?php echo isset($thanhvien)? $thanhvien : '' ?>"><a href="<?php echo base_url() ?>thanhvien.html" class=" <?php echo isset($thanhvien)? $thanhvien : '' ?>"><i class="icon-pencil"></i>Thành viên</a>
                                        
                                    </li>
                                    
                                    <?php if($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '1') { ?>
                                        <li class=" <?php echo isset($pageHoso)? $pageHoso : '' ?>"><a href="<?php echo base_url() ?>account.html" class="<?php echo isset($pageHoso)? $pageHoso : '' ?>"><i class="icon-envelope"></i>Hồ sơ cá nhân</a></li>
                                    <?php }else if ($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '0') { ?>
                                        <li class=" <?php echo isset($pageHoso)? $pageHoso : '' ?>"><a href="<?php echo base_url() ?>admin.html" class="<?php echo isset($pageHoso)? $pageHoso : '' ?>" ><i class="icon-envelope"></i>Trang quản trị</a></li>
                                    <?php  } ?>
                                </ul>
                            </div>                         
                        </div> 
                    </nav>
                <!-- </div> -->
            </div>
        </div>
    </div>
</header>

    