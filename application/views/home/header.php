<header > 
    <div class="header-bg">
        <div id="headerstic">
            <div class=" top-bar container">
                <!-- <div class="row">    -->
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="<?php echo base_url() ?>"><img class="img-logo" style="width: 200px;" src="<?php echo base_url() ?>public/images/2.png"></a>
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                                  <span class="sr-only">Toggle navigation</span>

                                  <span class="icon-bar"></span>

                                  <span class="icon-bar"></span>

                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>

                                </button>
                            </div>
                            
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="<?php echo isset($trangchu)? $trangchu : '' ?>"><a href="<?php echo base_url() ?>" ><i class="icon-home"></i>Trang chủ</a>
                                    </li>

                                    <li class=" <?php echo isset($new)? $new : '' ?>"><a href="<?php echo base_url() ?>tintuc.html" class="<?php echo isset($new)? $new : '' ?>" ><i class="fa fa-newspaper-o menu-icon" ></i>Tin tức</a>
                                    </li>
                                    <li class="<?php echo isset($bv)? $bv : '' ?>"><a href="<?php echo base_url() ?>benhvien.html" class="<?php echo isset($bv)? $bv : '' ?>" ><i class="fa fa-hospital-o menu-icon"></i>Bệnh viện</a>
                                    </li>
                                    <li class="<?php echo isset($bs)? $bs : '' ?>"><a href="<?php echo base_url() ?>bacsi.html" class="<?php echo isset($bs)? $bs : '' ?>" ><i class="fa fa-user-md menu-icon"></i>Bác sĩ</a>
                                    </li>
                                    
                                    <li class="<?php echo isset($benh)? $benh : '' ?>"><a href="<?php echo base_url() ?>benh.html" class="<?php echo isset($benh)? $benh : '' ?>"><i class="fa fa-stethoscope menu-icon"></i>Bệnh</a>
                                    </li>
                                     <li class="<?php echo isset($thuoc)? $thuoc : '' ?>"><a href="<?php echo base_url() ?>thuoc.html" class="<?php echo isset($thuoc)? $thuoc : '' ?>"><i class="fa fa-medkit menu-icon"></i>Thuốc</a>
                                    </li>
                                    
                                    <?php if($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '0') { ?>
                                        <li class="dropdown <?php echo isset($pageHoso)? $pageHoso : '' ?>">
                                            <a href="<?php echo base_url() ?>account.html" class="dropdown-toggle" data-toggle="dropdown" id="dangnhap-dky">
                                                
                                                <?php if ($this->session->userdata('user')['avatar'] == ''){ ?>
                                                  <img class="profile-image" style="width: 35px; margin-top: -7px;" src="<?php echo base_url() ?>images/profile.png">
                                                <?php }else { ?>
                                                  <img class="profile-image" style="width: 35px; margin-top: -7px;" src="<?php echo base_url() ?>images/avatar/<?php echo $this->session->userdata('user')['avatar'] ?>">
                                                <?php } ?>
                                           
                                                <?php echo $this->session->userdata('user')['name'] ?>
                                                    
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url() ?>account.html">Hồ sơ cá nhân</a></li>
                                                <li><a href="<?php echo base_url();?>login/logout">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    <?php }else if ($this->session->has_userdata('user') && $this->session->userdata('user')['group'] != '0') { ?>
                                        <li class="dropdown <?php echo isset($pageHoso)? $pageHoso : '' ?>">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dangnhap-dky">
                                                
                                                 <?php if ($this->session->userdata('user')['avatar'] == ''){ ?>
                                                  <img class="profile-image" style="width: 35px; margin-top: -7px;" src="<?php echo base_url() ?>images/profile.png">
                                                <?php }else { ?>
                                                  <img class="profile-image" style="width: 35px; margin-top: -7px;" src="<?php echo base_url() ?>images/avatar/<?php echo $this->session->userdata('user')['avatar'] ?>">
                                                <?php } ?>
                                           
                                                <?php echo $this->session->userdata('user')['name'] ?>
                                                    
                                            </a>
                                             <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url() ?>admin.html">Trang quản trị</a></li>
                                                <li><a href="<?php echo base_url();?>login/logout">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    <?php  }else{ ?>
                                        <li><a href="<?php echo base_url() ?>pageLogin" id ="dangnhap-dky"  ><i class="fa fa-sign-in menu-icon"></i><span style="padding: 5px; font-weight: bold; border: 1px solid #ffcb59; color: #ffcb59"> <span style="font-size: 20px;">+</span> TẠO HỒ SƠ</span></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                                  
                        </div>
                    </nav>
                <!-- </div>     -->
            </div><!--Topbar End-->
        </div>  
    </div>
</header>
<!-- style="width: 80%; background: url(<?php echo base_url() ?>images/Button-ĐK.png); background-size: cover;background-repeat: no-repeat;" -->