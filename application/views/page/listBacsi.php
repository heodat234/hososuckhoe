<section>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
              <h1>Danh sách bác sĩ</h1>
          </div>
        </div>
      </div>
    </div>
    <div id="shortcode-12">
      <div class="container body-list">
        <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12 left body-ds-tin"  >
          <ul>
            <?php foreach ($bacsi as $bs): ?>
              <li class="ds-tin" >
                    <a href="<?php echo base_url().'bacsi/'.$bs['id']?>"><img style=""  class="img-responsive" src="<?php echo base_url().'images/bacsi/'.$bs['anh'] ?>"></a>
                  <div class="ds-tin-content" >
                    <div><h3><a href="<?php echo base_url().'bacsi/'.$bs['id']?>"><?php echo $bs['ten'] ?></a></h3></div>
                    <div>
                      <i class="fa fa-graduation-cap"></i><p> <?php echo $bs['trinh_do'] ?></p>
                    </div>
                    <div>
                      <i class="fa fa-code-fork"></i><p> <?php echo $bs['chuyen_khoa'] ?></p>
                    </div>
                    <div>
                      <i class="fa fa-map-marker"></i><p> <?php echo $bs['noi_lam_viec'] ?></p>
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
              <h3 class="head">Bác Sĩ Nổi Bật</h3>
            </div>
            <div>
                <?php foreach ($noibat as $nb): ?>
                    <div class="img-noibat" >
                      <a href="<?php echo base_url().'bacsi/'.$nb['id']?>">
                        <img width="100%"  src="<?php echo base_url().'images/bacsi/'.$nb['anh'] ?>">
                      </a>
                    </div>
                    
                    <div class="content-noibat" >
                        <h4  >
                            <a href="<?php echo base_url().'bacsi/'.$nb['id']?>"><?php echo $nb['ten'] ?></a>
                        </h4>
                        <h5 >
                            <span><?php echo $nb['chuyen_khoa'] ?></span>
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