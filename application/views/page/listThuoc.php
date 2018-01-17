
<section>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
              <h1>Thông tin thuốc</h1>
          </div>
        </div>
      </div>
    </div>
    <div id="shortcode-12">
      <div class="container body-list">
        <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12 left body-ds-tin thongtin-thuoc">
          <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3 item-thuoc">
                    <div class ="thuoc-img">
                      <a href="<?php echo base_url().'thuoc/'?>">
                        <img src="<?php echo base_url() ?>images/thuoc/thuoc.jpg">
                      </a>
                    </div>
                    <div class="icon-box2-title tenthuoc">
                       <a href="<?php echo base_url().'thuoc/'?>">Flomate 80mg</a>
                    </div>
                    <p class= "gia-thuoc">120.000 VND</p>
          </div>   
         <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3 item-thuoc">
                    <div class ="thuoc-img">
                      <a href="<?php echo base_url().'thuoc/'?>">
                        <img src="<?php echo base_url() ?>images/thuoc/thuoc.jpg">
                      </a>
                    </div>
                    <div class="icon-box2-title tenthuoc">
                       <a href="<?php echo base_url().'thuoc/'?>">Flomate 80mg</a>
                    </div>
                    <p class= "gia-thuoc">120.000 VND</p>
          </div>   
         <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3 item-thuoc">
                    <div class ="thuoc-img">
                      <a href="<?php echo base_url().'thuoc/'?>">
                        <img src="<?php echo base_url() ?>images/thuoc/thuoc.jpg">
                      </a>
                    </div>
                    <div class="icon-box2-title tenthuoc">
                       <a href="<?php echo base_url().'thuoc/'?>">Flomate 80mg</a>
                    </div>
                    <p class= "gia-thuoc">120.000 VND</p>
          </div>   
          <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3 item-thuoc">
                    <div class ="thuoc-img">
                      <a href="<?php echo base_url().'thuoc/'?>">
                        <img src="<?php echo base_url() ?>images/thuoc/thuoc.jpg">
                      </a>
                    </div>
                    <div class="icon-box2-title tenthuoc">
                       <a href="<?php echo base_url().'thuoc/'?>">Flomate 80mg</a>
                    </div>
                    <p class= "gia-thuoc">120.000 VND</p>
          </div>   
         <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3 item-thuoc">
                    <div class ="thuoc-img">
                      <a href="<?php echo base_url().'thuoc/'?>">
                        <img src="<?php echo base_url() ?>images/thuoc/thuoc.jpg">
                      </a>
                    </div>
                    <div class="icon-box2-title tenthuoc">
                       <a href="<?php echo base_url().'thuoc/'?>">Flomate 80mg</a>
                    </div>
                    <p class= "gia-thuoc">120.000 VND</p>
          </div>   
          <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3 item-thuoc">
                    <div class ="thuoc-img">
                      <a href="<?php echo base_url().'thuoc/'?>">
                        <img src="<?php echo base_url() ?>images/thuoc/thuoc.jpg">
                      </a>
                    </div>
                    <div class="icon-box2-title tenthuoc">
                       <a href="<?php echo base_url().'thuoc/'?>">Flomate 80mg</a>
                    </div>
                    <p class= "gia-thuoc">120.000 VND</p>
          </div>  
        </div>
        
        <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12 right">
          <div>
            <div class="heading">
              <h3 class="head"><i class="fa fa-folder-o" style="color: #f26529;"></i> Nhóm dược lý</h3>
            </div>
            <div>
              <ul class="list-categories list-categories_widget list-bv">
                <?php foreach ($loai_thuoc as $loai): ?>
                  <li><a href="<?php echo base_url().'thuocByIdLoai/'.$loai['id']?>"><span class="list-categories__name"><?php echo $loai['ten'] ?></span></a></li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>