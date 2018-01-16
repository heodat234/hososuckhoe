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

                                    <li class=" <?php echo isset($new)? $new : '' ?>"><a href="<?php echo base_url() ?>tintuc.html" class="<?php echo isset($new)? $new : '' ?>" ><i class="icon-cog"></i>Tin tức</a>
                                    </li>
                                    <li class="<?php echo isset($bv)? $bv : '' ?>"><a href="<?php echo base_url() ?>benhvien.html" class="<?php echo isset($bv)? $bv : '' ?>" ><i class="icon-cog"></i>Bệnh viện</a>
                                    </li>
                                  
                                    
                                    <li class="<?php echo isset($thanhvien)? $thanhvien : '' ?>"><a href="<?php echo base_url() ?>thanhvien.html" class="<?php echo isset($thanhvien)? $thanhvien : '' ?>"><i class="icon-pencil"></i>Thành viên</a>
                                    </li>
                                    
                                    <?php if($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '0') { ?>
                                        <li class="dropdown <?php echo isset($pageHoso)? $pageHoso : '' ?>">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                
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
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                
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
                                        <li ><a href="<?php echo base_url() ?>pageLogin" id ="dangnhap-dky"><i class="icon-pencil"> </i>Đăng nhập/Đăng ký</a>
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
