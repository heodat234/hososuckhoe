
<div>
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
        <!-- <div class="row"> -->
          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
            <div class="col-md-9 col-sm-12 col-lg-9 col-xs-12 no-pad body-ds-tin">
              <div class="title-new">
                <h3 class=""><?php echo $tintuc['title'] ?></h3>
              </div>
              <div class="content-news">
                <p><?php echo $content[0]; ?></p>
              </div>
              <div class="fb-share-button" data-href="http://hososuckhoe.org/tintuc/<?php echo $tintuc['id'] ?>" data-layout="button_count"></div> 
              <div class="cmt-news">
                <div class="fb-comments" data-href="http://hososuckhoe.org/staging/tintuc/<?php echo $tintuc['id'] ?> " data-width="100%" data-numposts="5" data-size="large" data-mobile-iframe="true"></div>
              </div>           
            </div>
            <div class="col-md-3 col-sm-12 col-lg-3 col-xs-12 right">
              <div>
                <div class="heading">
                  <h4 class="head"><i class="fa fa-folder-o" style="color: #f26529;"></i> Danh mục tin tức</h4>
                </div>
                <div>
                  <?php foreach ($category as $tt): ?>
                    <div class="img-noibat" >
                      <a href="<?php echo base_url().'tintuc/'.$tt['id'].'-'.to_slug($tt['title']).'.html'?>">
                        <?php if (isset(json_decode($tt['image'],true)[0]['data-original'])){ ?>
                          <img style="width: 100%"  src="<?php echo json_decode($tt['image'],true)[0]['data-original'] ?>">
                        <?php }else{ ?>
                          <img style="width: 100%"  src="<?php echo json_decode($tt['image'],true)[0]['src'] ?>">
                        <?php } ?>
                      </a>
                    </div>
                    
                    <div class="content-noibat" >
                        <h5 >
                            <a href="<?php echo base_url().'tintuc/'.$tt['id'].'-'.to_slug($tt['title']).'.html'?>"><?php echo word_limiter($tt['title'],10) ?></a>
                        </h5>
                        <h6><?php echo word_limiter($tt['short_desc'],5) ?></h6>
                    </div>
                    <div class="clearfix vien-tin"></div>
                  <?php endforeach ?>
                  
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
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- </div> -->
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var x = document.getElementsByClassName("lazy");

   for (var i = 0; i < x.length; i++) {
    var url = x[i].attributes.getNamedItem('data-original').value;
    x[i].setAttribute('src', url);
    x[i].setAttribute('class','lazy img-responsive');
   }
</script>
