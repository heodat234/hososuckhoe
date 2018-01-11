<div>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
            <h1>Danh sách bệnh viện</h1>
          </div>
          
        </div>
      </div>
    </div>
    <div id="shortcode-12">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
            <div class="col-md-9 col-sm-12 col-lg-9 col-xs-12 no-pad ">
              <div>
                <h3 class=""><?php echo $tintuc['title'] ?></3>
              </div>
              <ul class="entry-meta clearfix">
                <li><a href=""><i class="fa fa-user"></i> Admin</a></li>
                <li><a href=""><i class="fa fa-calendar"></i>  <?php echo date('d-m-Y',strtotime($tintuc['created_at'])) ?> </a></li>
                <li><a href=""><i class="fa fa-eye"></i>  <?php echo number_format($tintuc['view']+1) ?></a></li>
              </ul>
              <div class="img-news">
                <img width="100%" height="400px" src="<?php echo base_url().'images/tintuc/'.$tintuc['image'] ?>">
              </div>
              <div class="content-news">
                <p><?php echo $tintuc['content'] ?></p>
              </div> 
              <div class="cmt-news">
                Bình luận
              </div>           
            </div>
            <div class="col-md-3 col-sm-12 col-lg-3 col-xs-12 right">
              <div>
                <div class="heading">
                  <h4 class="head"><i class="fa fa-folder-o" style="color: #f26529;"></i> Danh mục tin tức</h4>
                </div>
                <div>
                  <ul class="list-categories list-categories_widget">
                    <?php foreach ($category as $tt): ?>
                      <li><a href="<?php echo base_url().'tintuc/'.$tt['id']?>"><span class="list-categories__name"><?php echo $tt['title'] ?></span></a></li>
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
</div>

