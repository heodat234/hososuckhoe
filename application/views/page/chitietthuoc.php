
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
        <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12 no-pad body-ds-tin">
          <div>
            <h3 class=""><?php echo $thuoc['name'] ?></h3>
          </div>
          
          <?php foreach ($content as $key => $value): ?>
                <div class="content-news">
                  <?php echo $value ?>
                </div>
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
                            <a href="<?php echo base_url().'thuoc/'.$tt['id']?>"><?php echo $tt['name'] ?></a>
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
  
</script>