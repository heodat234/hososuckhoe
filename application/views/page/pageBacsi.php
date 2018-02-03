

<div>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
            <h1>Thông tin bác sĩ</h1>
          </div>
          
        </div>
      </div>
    </div>
    <div id="shortcode-12">
      <div class="container">
          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="margin-bottom: 20px;">
            <div class="col-md-9 col-sm-12 col-lg-9 col-xs-12 no-pad body-ds-tin" >
              
              <div  style="text-align: center;">
                <img width="40%" src="<?php echo $image ?>">
              </div>
              <div style="text-align: center;">
                <h3 class=""><?php echo $bacsi['name'] ?></h3>
                <div><h4>chuyên khoa: <b><?php echo $bacsi['branch'] ?></b></h4></div>
                <div><p><?php echo $bacsi['short_desc'] ?></p></div>
              </div>
              <?php foreach ($content as $key => $value): ?>
                <div class="content-news">
                  <?php echo $value ?>
                </div>
              <?php endforeach ?>
              <div class="clearfix"></div>         
            </div>
            <div class="col-md-3 col-sm-12 col-lg-3 col-xs-12 right">
              <div>
                <div class="heading">
                  <h4 class="head"><i class="fa fa-folder-o" style="color: #f26529;"></i> Danh mục tin tức</h4>
                </div>
                <div>
                  <ul class="list-categories list-categories_widget list-bv">
                    <?php foreach ($cate_bacsi as $cate): ?>
                      <li><a href="<?php echo base_url().'bacsi/'.$cate['id']?>"><span class="list-categories__name"><?php echo $cate['name'] ?></span></a></li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </div>
              <div style="margin-top: 20px">
                <div class="heading">
                  <h4 class="head"><i class="fa fa-star" style="color: #f26529;"></i> Video hoạt động</h4>
                </div>
                <div style="border-top:1px solid #ddd">
                  <div>
                    <p>Quản lý hồ sơ sức khỏe cá nhân online</p>
                  </div>
                  <div>
                    <iframe width="100%"  src="https://www.youtube.com/embed/1-Zee9ZJH7o" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

