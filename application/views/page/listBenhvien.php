
<section>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
              <h1>Tin tức</h1>
          </div>
        </div>
      </div>
    </div>
    <div id="shortcode-12">
      <div class="container body-list">
        <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12 left body-ds-tin"  >
          <ul>
            <?php foreach ($benhvien as $bv): ?>
              <li class="ds-tin" >
                    <a href="<?php echo base_url().'tintuc/'.$bv['id']?>"><img style=""  class="img-responsive" src="<?php echo base_url().'images/tintuc/'.$bv['anh'] ?>"></a>
                  <div class="ds-tin-content" >
                    <div><h3><a href="<?php echo base_url().'tintuc/'.$bv['id']?>"><?php echo $bv['ten'] ?></a></h3></div>
                    <div>
                      <p><b>Chuyên khoa: </b><?php echo $bv['chuyen_khoa'] ?></p>
                    </div>
                    <div>
                      <p><?php echo $bv['dia_chi'] ?></p>
                    </div>
                  </div>
              </li>
              
            <?php endforeach ?>
          </ul>
          
          <div class="pagination-page"><?php echo $phantrang ?></div>
        </div>
        
        <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12 right">
          <div>
            <div class="heading">
              <h3 class="head">Bệnh Viện Nổi Bật</h3>
            </div>
            <div>
                <?php foreach ($noibat as $tt): ?>
                    <div class="img-noibat" >
                      <a href="<?php echo base_url().'tintuc/'.$tt['id']?>">
                        <img width="100%"  src="<?php echo base_url().'images/tintuc/'.$tt['anh'] ?>">
                      </a>
                    </div>
                    
                    <div class="content-noibat" >
                        <h4  >
                            <a href="<?php echo base_url().'tintuc/'.$tt['id']?>"><?php echo $tt['ten'] ?></a>
                        </h4>
                        <h5 >
                            <span>Địa chỉ: <?php echo $tt['dia_chi'] ?></span>
                        </h5>
                    </div>
                    <div class="clearfix"></div>
                    
                <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>