
<section>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
            <h1>Chi tiết bệnh</h1>
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
        <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12 left body-ds-tin thongtin-thuoc">
          <h3 style="color: blue"><?php echo $benh['name'] ?></h3>
           
          <article>
            <?php echo $desc; ?>
          </article>
          
    </div>

    <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12 right">
      <div>
        <div class="heading">
          <h2>Các bệnh liên quan</h2>
        </div>
        <div>
          <ul class="list-categories list-categories_widget list-bv">
            <?php foreach ($tuongtu as $tt): ?>
              <li><a href="<?php echo base_url().'benh/'.$tt['id'].'-'.to_slug($tt['name']).'.html'?>"><span class="list-categories__name"><?php echo $tt['name'] ?></span></a></li>
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
<script type="text/javascript">

  
   var x = document.getElementsByClassName("lazy");
   // console.log( x.data('original'));

   for (var i = 0; i < x.length; i++) {
    var url = x[i].attributes.getNamedItem('data-original').value;
    x[i].setAttribute('src', url);
   }

  
</script>