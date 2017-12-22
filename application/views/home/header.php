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
                        <li class="dropdown" style="margin-top: 7px;"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i> <?php echo $this->session->userdata('user')['email']  ?></a>
                        </li>
                        <li style="margin-top: 7px; margin-left: 10px"><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out fa-lg"></i> Đăng xuất</a></li>
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
                                    <li class="active"><a href="<?php echo base_url() ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home"></i>Trang chủ</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="home-page-1.html">Home Page 1</a></li>
                                            <li><a href="home-page-2.html">Home Page 2</a></li>
                                            <li><a href="home-page-3.html">Home Page 3</a></li>
                                            <li><a href="home-page-4.html">Home Page 4</a></li>
                                            <li><a href="home-page-5.html">Home Page 5</a></li>
                                            <li><a href="home-page-6.html">Home Page 6</a></li>
                                            <li><a href="home-page-7.html">Home Page 7</a></li>
                                            <li><a href="home-page-8.html">Home Page 8</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i>Bệnh sử<b class="icon-angle-down"></b></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown"><a href="#">Page Elements</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="page-elements-1.html">Page Elements 1</a></li>
                                                    <li><a href="page-elements-2.html">Page Elements 2</a></li>
                                                    <li><a href="page-elements-3.html">Page Elements 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="typography.html">Typography</a></li>
                                            <li><a href="columns.html">Columns</a></li>
                                            <li><a href="pricing-tables.html">Pricing Tables</a></li>
                                            <li><a href="pricing-plans.html">Pricing Plans</a></li>
                                            <li><a href="flip-box.html">Flip Box</a></li>
                                            <li><a href="call-to-action.html">Call To Action</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-file"></i>Tra cứu<b class="icon-angle-down"></b></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown"><a href="#">About Us</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="about-us-1.html">About Us 1</a></li>
                                                    <li><a href="about-us-2.html">About Us 2</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Services</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="services-1.html">Services 1</a></li>
                                                    <li><a href="services-2.html">Services 2</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="departments.html">Departments</a></li>
                                            <li class="dropdown"><a href="#">Meet Our Doctors</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="meet-our-doctors-1.html">Meet Our Doctors 1</a></li>
                                                    <li><a href="meet-our-doctors-2.html">Meet Our Doctors 2</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="testimonials.html">Testimonials</a></li>
                                            <li><a href="faq.html">FAQs</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-camera"></i>Tin tức<b class="icon-angle-down"></b></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown left-dropdown"><a href="#">Gallery Carousel</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="gallery-1-column-carousel.html">1 Column Carousel</a></li>
                                                    <li><a href="gallery-2-columns-carousel.html">2 Columns Carousel</a></li>
                                                    <li><a href="gallery-3-columns-carousel.html">3 Columns Carousel</a></li>
                                                    <li><a href="gallery-4-columns-carousel.html">4 Columns Carousel</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown left-dropdown"><a href="#">Gallery Full Width</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="gallery-1-column.html">Gallery 1 Column</a></li>
                                                    <li><a href="gallery-2-columns.html">Gallery 2 Columns</a></li>
                                                    <li><a href="gallery-3-columns.html">Gallery 3 Columns</a></li>
                                                    <li><a href="gallery-4-columns.html">Gallery 4 Columns</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown left-dropdown"><a href="#">Gallery Left Sidebar</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="gallery-1-column-left-sidebar.html">Gallery 1 Column</a></li>
                                                    <li><a href="gallery-2-columns-left-sidebar.html">Gallery 2 Columns</a></li>
                                                    <li><a href="gallery-3-columns-left-sidebar.html">Gallery 3 Columns</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown left-dropdown"><a href="#">Gallery Right Sidebar</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="gallery-1-column-right-sidebar.html">Gallery 1 Column</a></li>
                                                    <li><a href="gallery-2-columns-right-sidebar.html">Gallery 2 Columns</a></li>
                                                    <li><a href="gallery-3-columns-right-sidebar.html">Gallery 3 Columns</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-pencil"></i>Thành viên<b class="icon-angle-down"></b></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown left-dropdown"><a href="#">Blog Masonry</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="blog-masonry-full-width.html">Full Width</a></li>
                                                    <li><a href="blog-masonry-left-sidebar.html">Left Sidebar</a></li>
                                                    <li><a href="blog-masonry-right-sidebar.html">Right Sidebar</a></li> 
                                                </ul>
                                            </li>
                                            <li class="dropdown left-dropdown"><a href="#">Blog Medium Image</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="blog-medium-full-width.html">Full Width</a></li>
                                                    <li><a href="blog-medium-left-sidebar.html">Left Sidebar</a></li>
                                                    <li><a href="blog-medium-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown left-dropdown"><a href="#">Blog Large Image</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="blog-full-width.html">Blog Full Width</a></li>
                                                    <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                                </ul>
                                            </li>                   
                                            <li><a href="blog-with-slider.html">Blog With Slider</a></li>
                                            <li class="dropdown left-dropdown"><a href="#">Blog Single Post</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="blog-image-post.html">Image Post</a></li>
                                                    <li><a href="blog-gallery-post.html">Gallery Post</a></li>
                                                    <li><a href="blog-video-post.html">Video Post</a></li>
                                                    <li><a href="blog-full-width-post.html">Full Width Post</a></li>
                                                </ul>
                                            </li>   
                                          </ul>
                                    </li>
                                    
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-envelope"></i>Liên hệ<b class="icon-angle-down"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="contact-1.html">Contact Version 1</a></li>
                                            <li><a href="contact-2.html">Contact Version 2</a></li>
                                            <li><a href="contact-3.html">Contact Version 3</a></li>
                                        </ul>
                                    </li>

                                    <?php if($this->session->has_userdata('user')) { ?>
                                         <li class="dropdown"><a href="<?php echo base_url() ?>account" ><i class="icon-envelope"></i>Hồ sơ cá nhân<b class="icon-angle-down"></b></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                         
                                  
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>    
            </div><!--Topbar End-->
        </div>  
    </div>
</header>