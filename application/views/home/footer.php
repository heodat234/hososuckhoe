 <div class="complete-footer">
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 foot-widget">
                    <a href="#"><div class=" col-xs-12 no-pad" style="margin-left: -25px; margin-bottom: 10px;"><img class="img-logo" style="width: 200px;" src="<?php echo base_url() ?>public/images/2.png"></div></a>
                    <address class="foot-address">
                        <div class="col-xs-12 no-pad"><i class="icon-globe address-icons"></i>10 Đường số 11 <br />Quận 6, TP HCM</div>
                        <div class="col-xs-12 no-pad"><i class="icon-phone2 address-icons"></i>+84 455 755</div>
                        <!-- <div class="col-xs-12 no-pad"><i class="icon-file address-icons"></i>+123 555 755</div> -->
                        <div class="col-xs-12 no-pad"><i class="icon-mail address-icons"></i>hososuckhoe.org@gmail.com</div>
                    </address>
                </div>
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
                <div class="col-xs-12 col-sm-6 col-md-3 recent-tweet-foot foot-widget">
                    <div class="fb-page" data-href="https://www.facebook.com/hososuckhoe.org" data-show-facepile="true" data-show-facepile="false" data-width="250" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" ><blockquote cite="https://www.facebook.com/hososuckhoe.org" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/hososuckhoe.org">Hồ sơ sức khỏe</a></blockquote></div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 foot-widget">
                    <div class="foot-widget-title">Liên hệ hợp tác</div>
                    <p>Gửi đóng góp cho chúng tôi.</p>
                    <div class="news-subscribe"><a class="news-button" href="<?php echo base_url() ?>lienhe.html">Liên hệ</a></div>
                    <div class="foot-widget-title">Hồ sơ sức khỏe</div>
                </div>
            </div>
         </div>       
    </footer>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 foot-widget-bottom">
                    <p class="col-xs-12 col-md-5 no-pad">All Rights Reserved | Designed by <a href="http://hungminhits.com/">HungMinhITS</a></p>
                    <ul class="foot-menu col-xs-12 col-md-7 no-pad">
                        <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>                           
                    </ul>
                </div>
            </div>
        </div> 
    </div>
</div>