
<section>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
              <h1>Thông tin thuốc</h1>
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
        <div class="col-md-9 col-sm-12 col-lg-9 col-xs-12 left body-ds-tin thongtin-thuoc">
          <?php foreach ($thuocs as $thuoc): ?>
            <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3 item-thuoc">
              <div class ="thuoc-img">
                <a href="<?php echo base_url().'thuoc/'.$thuoc['id'].'-'.to_slug($thuoc['name']).'.html' ?>">
                  <img src="<?php echo json_decode($thuoc['image'],true)[0]['src'] ?>">
                </a>
              </div>
              <div class="icon-box2-title tenthuoc">
                 <a href="<?php echo base_url().'thuoc/'.$thuoc['id'].'-'.to_slug($thuoc['name']).'.html' ?>"> <?php echo $thuoc['name'] ?> </a>
              </div>
              <p class= "gia-thuoc"><?php echo $thuoc['price'] ?> </p>
            </div>
          <?php endforeach ?>
             
         <div class="pagination-page"><?php echo $phantrang ?></div>
        </div>
        
        <div class="col-md-3 col-sm-12 col-lg-3 col-xs-12 right">
          <div>
            <div class="heading">
              <h3 class="head"><i class="fa fa-folder-o" style="color: #f26529;"></i> Nhóm dược lý</h3>
            </div>
            <div>
              <ul class="list-categories list-categories_widget list-bv">
                <?php foreach ($loai_thuoc as $loai): ?>
                  <?php if ( isset($idLoai) && $id_Loai == $loai['id']){ ?>
                    <li class="active"><a href="<?php echo base_url().'thuocByIdLoai/'.$loai['id']?>"><span class="list-categories__name"><?php echo $loai['name'] ?></span></a></li>
                  <?php }else{ ?>
                    <li><a href="<?php echo base_url().'thuocByIdLoai/'.$loai['id']?>"><span class="list-categories__name"><?php echo $loai['name'] ?></span></a></li>
                  <?php  } ?>
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