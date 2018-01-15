<div>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
            <?php if ($loai == 1){ ?>
              <h1>Tin tức Y Khoa</h1>
            <?php }else{ ?>
              <h1>Tin tức Nội Bộ</h1>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div id="shortcode-12">
      <div class="container body-list">
        <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12 left "  style="border-right: 1px solid #ddd">
          <?php foreach ($benhvien as $bv): ?>
              <div class="img-noibat" >
                <div>
                  <img  src="<?php echo base_url().'images/tintuc/'.$bv['anh'] ?>">
                </div>
              </div>
              
              <div class="content-noibat" >
                  <h4  >
                      <a href="<?php echo base_url().'tintuc/'.$bv['id']?>"><?php echo $bv['ten'] ?></a>
                  </h4>
                  <h5 >
                      <span> <?php echo $bv['dia_chi'] ?></span>
                  </h5>
              </div>
              <div class="clearfix"></div>
          <?php endforeach ?>
          <div class="pagination-page"><?php echo $phantrang ?></div>
        </div>
            
        <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12 right">
          <div>
            <div class="heading">
              <h4 class="head"><i class="fa fa-folder-o" style="color: #f26529;"></i> Tin nổi bật</h4>
            </div>
            <div>
                <?php foreach ($noibat as $tt): ?>
                    <div class="img-noibat" >
                      <div>
                        <img  src="<?php echo base_url().'images/tintuc/'.$tt['image'] ?>">
                      </div>
                    </div>
                    
                    <div class="content-noibat" >
                        <h4  >
                            <a href="<?php echo base_url().'tintuc/'.$tt['id']?>"><?php echo $tt['title'] ?></a>
                        </h4>
                        <h5 >
                            <span>Lượt xem: <?php echo $tt['view'] ?></span>
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