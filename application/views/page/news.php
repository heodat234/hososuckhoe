<style type="text/css">
  .content-news h2 {
    font-size: 14px;
        display: block;
    overflow: hidden;
    background: #fffba2;
    padding: 10px;
    border: 1px dashed #25abe0;
    line-height: 22px;
  }
</style>
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
            <div class="col-md-9 col-sm-12 col-lg-9 col-xs-12 no-pad ">
              <div style="margin-bottom: 40px">
                <h3 class=""><?php echo $tintuc['title'] ?></h3>
              </div>
              <div class="content-news">
                <p><?php echo $content[0]; ?></p>
              </div> 
              <div class="cmt-news">
                <div class="fb-comments" data-href="http://hososuckhoe.org/staging/" data-width="100%" data-numposts="5"></div>
              </div>           
            </div>
            <div class="col-md-3 col-sm-12 col-lg-3 col-xs-12 right">
              <div>
                <div class="heading">
                  <h4 class="head"><i class="fa fa-folder-o" style="color: #f26529;"></i> Danh mục tin tức</h4>
                </div>
                <div>
                  <ul class="list-categories list-categories_widget list-bv">
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
   }
</script>
