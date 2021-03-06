
<section>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
              <h1>Danh sách bệnh viện</h1>
          </div>
          <div class="box-search ctiet" >
              <form method="get" action="<?php echo base_url() ?>timkiem.html">
                  <input class="data khungsearch" type="text" name="search" placeholder="Tra cứu thông tin bệnh viện, bác sĩ, thuốc,...">
                  <button  ><span class="fa fa-search fa-lg"></span></button>
              </form>
          </div>
        </div>
      </div>
    </div>
    <div id="shortcode-12">
      <div class="container body-list">
        <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12 left body-ds-tin"  >
          <ul>
            <?php foreach ($benhvien as $bv):
            $headers = @get_headers(json_decode($bv['image'],true)[0]['src']); ?>
              <li class="ds-tin" >
                  <?php if ($headers == true){ ?>
                  <a href="<?php echo base_url().'benhvien/'.$bv['id'].'-'.to_slug($bv['name']).'.html'?>"><img style=""  class="img-responsive" src="<?php echo json_decode($bv['image'],true)[0]['src'] ?>"></a>
                  <?php }else{ ?>
                    <a href="<?php echo base_url().'bacsi/'.$bv['id'].'-'.to_slug($bv['name']).'.html' ?>"><img class="avatar-bs"  class="img-responsive" src="<?php echo base_url() ?>images/benhvien.jpg"></a>
                  <?php } ?>
                    
                  <div class="ds-tin-content" >
                    <div><h3><a href="<?php echo base_url().'benhvien/'.$bv['id'].'-'.to_slug($bv['name']).'.html'?>"><?php echo $bv['name'] ?></a></h3></div>
                    
                    <div>
                      <p><b>Số điện thoai: </b><?php echo $bv['tel'] ?></p>
                    </div>
                    <div>
                      <p><b>Địa chỉ: </b><?php echo $bv['address'] ?></p>
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
                      <a href="<?php echo base_url().'benhvien/'.$tt['id'].'-'.to_slug($tt['name']).'.html'?>">
                        <img style="width: 70%"  src="<?php echo json_decode($tt['image'],true)[0]['src'] ?>">
                      </a>
                    </div>
                    
                    <div class="content-noibat" >
                        <h4  >
                            <a href="<?php echo base_url().'benhvien/'.$tt['id'].'-'.to_slug($tt['name']).'.html'?>"><?php echo $tt['name'] ?></a>
                        </h4>
                        <h5 >
                            <span>Địa chỉ: <?php echo $tt['address'] ?></span>
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