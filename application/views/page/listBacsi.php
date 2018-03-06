<section>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
              <h1>Danh sách bác sĩ</h1>
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
            <?php foreach ($bacsi as $bs): 
              $headers = @get_headers(json_decode($bs['image'],true)[0]['src']);
              // var_dump($headers);
            ?>
              <li class="ds-tin-bs" >
                <?php if ($headers == true){ ?>
                  <a href="<?php echo base_url().'bacsi/'.$bs['id'].'-'.to_slug($bs['name']).'.html'?>"><img class="avatar-bs"  class="img-responsive" src="<?php echo json_decode($bs['image'],true)[0]['src'] ?>"></a>
                <?php }else{ ?>
                  <a href="<?php echo base_url().'bacsi/'.$bs['id'].'-'.to_slug($bs['name']).'.html'?>"><img class="avatar-bs"  class="img-responsive" src="<?php echo base_url() ?>images/profile.png"></a>
                <?php } ?>
                    
                  <div class=" tin-content-bs" >
                    <div><h3><a href="<?php echo base_url().'bacsi/'.$bs['id'].'-'.to_slug($bs['name']).'.html'?>"><?php echo $bs['name'] ?></a></h3></div>
                    <div>
                      <p><i class="fa fa-code-fork" style="margin-right: 5px;"></i><?php echo $bs['branch'] ?></p>
                    </div>
                    <div>
                      <p><i class="fa fa-map-marker" style="margin-right: 5px;"></i><?php echo $bs['short_desc'] ?></p>
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
                      <a href="<?php echo base_url().'bacsi/'.$nb['id'].'-'.to_slug($nb['name']).'.html'?>">
                        <img width="70%"  src="<?php echo json_decode($nb['image'],true)[0]['src'] ?>">
                      </a>
                    </div>
                    
                    <div class="content-noibat" >
                        <h4  >
                            <a href="<?php echo base_url().'bacsi/'.$nb['id'].'-'.to_slug($nb['name']).'.html'?>"><?php echo $nb['name'] ?></a>
                        </h4>
                        <h5 >
                            <span><?php echo $nb['branch'] ?></span>
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