<section>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
              <h1>Danh sách bệnh</h1>
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
          <div id="domBenh"></div>
          <div class="col-md-12 col-sm-12 loadBenh" >
            <ul >
              <?php foreach ($benhs as $benh): ?>
              <div  class="col-md-3 col-sx-6 ds-benh"><li><a href="<?php echo base_url()."benh/".$benh['id'].'-'.to_slug($benh['name']).'.html' ?>"><h5><?php echo $benh['name'] ?></h5></a></li></div>
              
              <?php endforeach ?>
            </ul>
          </div>
          
          
             
        </div>
        
        <div class="col-md-3 col-sm-12 col-lg-3 col-xs-12 right">
          <div>
            <div class="heading">
              <h4 class="head">Tìm bệnh theo nhóm bệnh</h4>
            </div>
            <div>
              <ul class="list-categories list-categories_widget list-bv">
                <?php foreach ($loai_benh as $loai): ?>
                  <?php if ( isset($idLoai) && $id_Loai == $loai['id']){ ?>
                    <li class="active"><a href="javascript:void(0)" onclick="loadBenh(<?php echo $loai['id'] ?>)"><span class="list-categories__name"><?php echo $loai['name'] ?></span></a></li>
                  <?php }else{ ?>
                    <li><a href="javascript:void(0)" onclick="loadBenh(<?php echo $loai['id'] ?>)"><span class="list-categories__name"><?php echo $loai['name'] ?></span></a></li>
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
<script type="text/javascript">
  function loadBenh(id) {
    $('.loadBenh').remove();
    $.ajax({
      url: '<?php echo base_url() ?>benhByIdLoai',
      type: 'get',
      dataType: 'json',
      data: {id: id},
    })
    .done(function(data) {
      // console.log(data);
      $('#domBenh').after(data);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }
</script>