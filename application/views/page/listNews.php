
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
            <?php foreach ($category as $tintuc): ?>
              <li class="ds-tin" >
                    <a href="<?php echo base_url().'tintuc/'.$tintuc['id']?>"><img style=""  class="img-responsive" src="<?php echo json_decode($tintuc['image'],true)[0]['data-original'] ?>"></a>
                  <div class="ds-tin-content" >
                    <div><h3><a href="<?php echo base_url().'tintuc/'.$tintuc['id']?>"><?php echo $tintuc['title'] ?></a></h3></div>
                    <div>
                      <h5><?php if ($tintuc['id_loai'] == 1){echo "Tin tức Y khoa"; ?>
                          <?php }else{ echo "Tin tức Nội bộ";} ?>
                      </h5>
                    </div>
                    <div>
                      <p><?php echo word_limiter($tintuc['short_desc'],30) ?></p>
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
              <h3 class="head"><i class="fa fa-folder-o" style="color: #f26529;"></i> Tin nổi bật</h3>
            </div>
            <div>
                <?php foreach ($noibat as $tt): ?>
                    <div class="img-noibat" >
                      <a href="<?php echo base_url().'tintuc/'.$tt['id']?>">
                        <img width="100%"  src="<?php echo json_decode($tt['image'],true)[0]['data-original'] ?>">
                      </a>
                    </div>
                    
                    <div class="content-noibat" >
                        <h4  >
                            <a href="<?php echo base_url().'tintuc/'.$tt['id']?>"><?php echo $tt['title'] ?></a>
                        </h4>
                        <h5 >
                            <span>Lượt xem: <?php echo $tt['view'] ?></span>
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