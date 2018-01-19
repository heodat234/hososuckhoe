
<section>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
              <h1>Chi tiết thuốc</h1>
          </div>
        </div>
      </div>
    </div>
    <div id="shortcode-12">
      <div class="container body-list">
        <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12 left body-ds-tin thongtin-thuoc">
          <h3><?php echo $thuoc['title'] ?></h3>

          <div class="carousel-wrapper">
            <div id="hero-carousel" class="carousel slide carousel-fade">
              <ol class="carousel-indicators">
                <li data-target="#hero-carousel" data-slide-to="0" class="active"></li>
                <?php for($i = 1 ; $i< count($anh);$i++): ?>
                  <li data-target="#hero-carousel" data-slide-to="<?php echo $i ?>"></li>
                <?php endfor ?>
              </ol>
              <div class="carousel-inner">
                <div class="item active">
                  <img class="slide-thuoc" src="<?php echo $anh[0]['src'] ?>">
                </div>
                <?php for($i = 1 ; $i< count($anh);$i++): ?>
                  <div class="item">
                    <img class="slide-thuoc" src="<?php echo $anh[$i]['data-src'] ?>">
                  </div>
                <?php endfor ?>
                
              </div>
              <a class="left carousel-control" href="#hero-carousel" data-slide="prev">
                <i class="fa fa-chevron-left left"></i>
              </a>
              <a class="right carousel-control" href="#hero-carousel" data-slide="next">
                <i class="fa fa-chevron-right right"></i>
              </a>
            </div>
          </div>
        
          <div >
            <span style="color: red; font-size: 20px"><?php echo $thuoc['price']?></span><?php echo $thuoc['unit'] ?>
          </div >
          <div class="short-desc"><?php echo $thuoc['short_desc'] ?></div>
          <?php foreach ($content as $ct): ?>
            <div class="content-news"><?php echo $ct ?></div>
          <?php endforeach ?>
          

        </div>
        
        <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12 right">
          <div>
            <div class="heading">
              <h2>Các sản phẩm tương tự</h2>
            </div>
            <div>
              <?php foreach ($tuongtu as $tt): ?>
                    <div class="img-noibat" >
                      <a href="<?php echo base_url().'thuoc/'.$tt['id']?>">
                        <img style="width: 70%"  src="<?php echo json_decode($tt['image'],true)[0]['src'] ?>">
                      </a>
                    </div>
                    
                    <div class="content-noibat" >
                        <h4  >
                            <a href="<?php echo base_url().'thuoc/'.$tt['id']?>"><?php echo $tt['title'] ?></a>
                        </h4>
                        <h5 >
                            <span>Giá: <?php echo $tt['price'] .$tt['unit'] ?></span>
                        </h5>
                    </div>
                    <div class="clearfix vien-tin"></div>
                    
                <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<script>
  $('.carousel').carousel({
    interval: 3000,
    pause: false
  })
</script>