<header> 
    <div class="header-bg">
        <div id="search-overlay">
            <div class="container">
                <div id="close">X</div>
                <input id="hidden-search" type="text" placeholder="Start Typing..." autofocus autocomplete="off"  /> <!--hidden input the user types into-->
                <input id="display-search" type="text" placeholder="Start Typing..." autofocus autocomplete="off" /> <!--mirrored input that shows the actual input value-->
            </div>
        </div> 
        <!--Topbar-->
        <div class="topbar-info no-pad">                    
            <div class="container">                     
                <div class="social-wrap-head col-md-4 no-pad">
                <?php if($this->session->has_userdata('user')) { ?>
                    <ul >
                        <li class="dropdown" style="margin-top: 13px;"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i> <?php echo $this->session->userdata('user')['name']  ?></a>
                        </li>
                        <li style="margin-top: 13px; margin-left: 10px"><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out fa-lg"></i> Đăng xuất</a></li>
                    </ul>
                <?php } else { ?>
                    <a class="btn btn-success" style="border-radius: 5px; margin-top: 3px" href="<?php echo base_url() ?>pageLogin"><i class="fa fa-sign-in" ></i> Đăng nhập/Đăng ký</a>
                <?php } ?>
                    
                </div>                            
                <div class="top-info-contact pull-right col-md-6">Gọi cho chúng tôi! +123 455 755  |    contact@imedica.com  <div id="search" class="fa fa-search search-head"></div>
                </div>                      
            </div>
        </div><!--Topbar-info-close-->   
                    
        <div id="headerstic">
            <div class=" top-bar container">
                <div class="row">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                
                                <a href="<?php echo base_url() ?>"><div class="logo"></div></a>
                            </div>
                            
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="<?php echo isset($trangchu)? $trangchu : '' ?>"><a href="<?php echo base_url() ?>" ><i class="icon-home"></i>Trang chủ</a>
                                    </li>

                                    <li class="<?php echo isset($benhsu)? $benhsu : '' ?>"><a href="<?php echo base_url() ?>benhsu.html" class="<?php echo isset($benhsu)? $benhsu : '' ?>" ><i class="icon-cog"></i>Bệnh sử</a>
                                    </li>
                                    
                                  
                                    
                                    <li class="<?php echo isset($thanhvien)? $thanhvien : '' ?>"><a href="<?php echo base_url() ?>thanhvien.html" class="<?php echo isset($thanhvien)? $thanhvien : '' ?>"><i class="icon-pencil"></i>Thành viên</a>
                                    </li>
                                    
                                   

                                    <?php if($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '1') { ?>
                                        <li class=" <?php echo isset($pageHoso)? $pageHoso : '' ?>"><a href="<?php echo base_url() ?>account.html" ><i class="icon-envelope"></i>Hồ sơ cá nhân</a></li>
                                    <?php }else if ($this->session->has_userdata('user') && $this->session->userdata('user')['group'] == '0') { ?>
                                        <li class=" <?php echo isset($pageHoso)? $pageHoso : '' ?>"><a href="<?php echo base_url() ?>admin.html" ><i class="icon-envelope"></i>Trang quản trị</a></li>
                                    <?php  } ?>
                                </ul>
                            </div>
                         
                                  
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>    
            </div><!--Topbar End-->
        </div>  
    </div>
</header>