 <div class="complete-footer">
    <footer id="footer">
        <div class="container">
            <div class="row">
                <!--Foot widget-->
                <div class="col-xs-12 col-sm-6 col-md-3 foot-widget">
                    <a href="#"><div class=" col-xs-12 no-pad" style="margin-left: -25px; margin-bottom: 10px;"><img class="img-logo" style="width: 200px;" src="<?php echo base_url() ?>public/images/2.png"></div></a>
                    
                    <address class="foot-address">
                        <div class="col-xs-12 no-pad"><i class="icon-globe address-icons"></i>10 Đường số 11 <br />Quận 6, TP HCM</div>
                        <div class="col-xs-12 no-pad"><i class="icon-phone2 address-icons"></i>+84 455 755</div>
                        <!-- <div class="col-xs-12 no-pad"><i class="icon-file address-icons"></i>+123 555 755</div> -->
                        <div class="col-xs-12 no-pad"><i class="icon-mail address-icons"></i>hungminhits@gmail.com</div>
                    </address>
                </div>
                
                <!--Foot widget-->
                <div class="col-xs-12 col-sm-6 col-md-3 recent-post-foot foot-widget">
                    <div class="foot-widget-title">Bài viết Y khoa</div>
                    <ul>
                        <?php if (isset($ykhoa)){ ?>
                            <?php foreach ($ykhoa as $y) { ?>
                                <li><a href="#"><?php echo $y['title'] ?><br /><span class="event-date"><?php echo date('d-m-Y',strtotime($y['created_at'])) ?></span></a></li>
                            <?php } ?>  
                        <?php }else { ?>
                            <li>Chưa có tin mới</li>
                        <?php  } ?>
                    </ul>
                </div>
                
                 <!--Foot widget-->
                <div class="col-xs-12 col-sm-6 col-md-3 recent-tweet-foot foot-widget">
                    <div class="foot-widget-title">Bài viết Nội bộ</div>
                    <ul>
                        <?php if (isset($noibo)){ ?>
                            <?php foreach ($noibo as $n) { ?>
                            <li><a href="#"><?php echo $n['title'] ?><br /><span class="event-date"><?php echo date('d-m-Y',strtotime($n['created_at'])) ?></span></a></li>
                            <?php } ?>
                        <?php }else { ?>
                            <li>Chưa có tin mới</li>
                        <?php  } ?>
                    </ul>
                </div>
                
                <!--Foot widget-->
                <div class="col-xs-12 col-sm-6 col-md-3 foot-widget">
                    <div class="foot-widget-title">Liên hệ hợp tác</div>
                    <p>Nhận thông báo mới từ chúng tôi.</p>
                    <div class="news-subscribe"><input type="text" class="news-tb" placeholder="Email Address" /><button class="news-button">Đăng ký</button></div>
                    <div class="foot-widget-title">Hồ sơ sức khỏe</div>
                    <div class="social-wrap">
                        <ul>
                        <li><a href="#"><i class="icon-facebook foot-social-icon" id="face-foot" data-toggle="tooltip" data-placement="bottom" title="Facebook"></i></a></li>
                        <li><a href="#"><i class="icon-social-twitter foot-social-icon" id="tweet-foot" data-toggle="tooltip" data-placement="bottom" title="Twitter"></i></a></li>
                        <li><a href="#"><i class="icon-google-plus foot-social-icon" id="gplus-foot" data-toggle="tooltip" data-placement="bottom" title="Google+"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin foot-social-icon" id="link-foot" data-toggle="tooltip" data-placement="bottom" title="Linked in"></i></a></li>
                        <li><a href="#"><i class="icon-rss foot-social-icon" id="rss-foot" data-toggle="tooltip" data-placement="bottom" title="RSS"></i></a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
         </div>       
    </footer>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <!--Foot widget-->
                <div class="col-xs-12 col-sm-12 col-md-12 foot-widget-bottom">
                    <p class="col-xs-12 col-md-5 no-pad">All Rights Reserved | Designed by <a href="http://hungminhits.com/">HungMinhITS</a></p>
                    <ul class="foot-menu col-xs-12 col-md-7 no-pad">
                        <li><a href="<?php echo base_url() ?>thanhvien.html">Thành viên</a></li>
                        <li><a href="<?php echo base_url() ?>benhsu.html">Bệnh sử</a></li>    
                        <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>                           
                    </ul>
                </div>
            </div>
        </div> 
    </div>
</div>